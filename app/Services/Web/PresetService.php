<?php
/**
 * 预提交服务
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/20/020
 * Time: 13:57
 */

namespace App\Services\Web;


use App\Models\Flow;
use App\Models\Step;
use App\Models\StepRun;
use App\Models\SubStep;
use App\Repository\Web\FlowRepository;
use App\Repository\Web\FormRepository;
use App\Services\OA\OaApiService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PresetService
{
    use NextStepApprover;//下一步骤审批人


    protected $formData;
    public $formRepository;

    public function __construct(FormDataService $formDataService, FormRepository $formRepository)
    {
        $this->formData = $formDataService;
        $this->formRepository = $formRepository;
    }

    /**
     * 处理预提交
     * @param $request
     */
    public function makePreset($request)
    {
        $flow = Flow::withTrashed()->find($request->input('flow_id'));
        $requestFormData = $request->input('form_data');
        //获取预提交步骤数据
        $step = $this->getStep($request, $flow);
        //过滤request表单data ,获取request的可编辑字段数据
        $filterRequestFormData = $this->filterRequestFormData($requestFormData, $step);
        //获取数据库表单data
        $dbFormData = $this->getDbFormData($request, $flow->form_id);
        //替换数据库表单数据
        $newDbFormData = $this->replaceRequestFormDataToDbFormData($filterRequestFormData, $dbFormData);
        //获取表单字段（含控件）
        $fields = $this->formRepository->getFields($flow->form_id);
        //计算表单的值（运算符号、字段类型、系统变量）全部表单字段
        $formData = $this->formData->getFilterFormData($newDbFormData, $fields);
        $editableFields = $step->available_fields;
        //只包含 可用字段
        $formData = array_only($formData, $editableFields);
        $nextStep = [];
        $step_end = 0;
        $message = '';

        if ($request->has('step_run_id') && intval($request->input('step_run_id'))) {
            //通过预提交
            $stepRun = StepRun::find($request->input('step_run_id'));

            if (count($step->next_step_key) == 0) {
                //结束流程
                $step_end = 1;
            } else {
                //流程未结束  获取下一步骤数据

                //下一步骤合并类型
                $nextMergeType = 0;
                $nextPrevStepKeyCount = 0;//下一步骤的上一步骤key的个数
                $pendingCount = 1;
                if (count($step->next_step_key) == 1) {
                    $nextStepData = Step::where(['flow_id' => $step->flow_id, 'step_key' => $step->next_step_key[0]])->first();
                    $nextMergeType = $nextStepData->merge_type;
                    $nextPrevStepKeyCount = count($nextStepData->prev_step_key);
                    $subStepKey = SubStep::where('parent_key', $nextStepData->step_key)->where('flow_id', $stepRun->flow_id)->pluck('step_key')->all();
                    $pendingCount = StepRun::where(['flow_id' => $step->flow_id, 'flow_run_id' => $stepRun->flow_run_id, 'action_type' => 0])->whereIn('step_key', $subStepKey)->count();
                }
                if ($nextPrevStepKeyCount > 0 && $nextMergeType == 1 && $pendingCount > 1) {
                    //下一步骤合并类型为必须 等待其它步骤完成才能进行下一步提交
                    $message = '下一步骤合并为必须，请等待其它步骤审批完成';
                } else {
                    $nextStep = $this->getNextSteps($step, $newDbFormData);
                    if (empty($nextStep)) {
                        abort(400, '该步骤为合并类型，后台配置错误，只能有一个审批步骤');
                    }

                    $nextStep = $nextStep->map(function ($field) {
                        return $field->only(['id', 'name', 'approver_type', 'approvers']);
                    })->all();
                }

            }
        } else {
            //发起预提交
            $nextStep = $this->getNextSteps($step, $newDbFormData);
            if (empty($nextStep)) {
                abort(400, '该步骤为合并类型，后台配置错误，只能有一个审批步骤');
            }

            $nextStep = $nextStep->map(function ($field) {
                return $field->only(['id', 'name', 'approver_type', 'approvers']);
            })->all();
        }

        $cacheData = [
            'form_data' => $formData,//表单data数据
            'available_steps' => $nextStep,//下一步骤数据
            'step_end' => $step_end,//是否结束步骤
            'concurrent_type' => $step->concurrent_type,//步骤并发类型
            'step_run_id' => $request->input('step_run_id'),//步骤运行ID
            //是否抄送
            'is_cc' => $step->is_cc,
            //抄送人
            'cc_person' => $step->cc_person ?: [],
        ];
        $timestamp = $this->setPresetDataToCache($cacheData);//预提交数据存入cache
        $responseData = [
            'available_steps' => $nextStep,
            'step_end' => $step_end,
            'timestamp' => $timestamp,
            'concurrent_type' => $step->concurrent_type,
            'flow_id' => $flow->id,
            'step_run_id' => $request->input('step_run_id'),//步骤运行ID
            'message' => $message,
            //是否抄送
            'is_cc' => $step->is_cc,
            //抄送人
            'cc_person' => $step->cc_person ?: [],
        ];
        return $responseData;
    }

    /**
     * 获取步骤数据
     * @param $request
     * @param $flow
     * @return mixed
     */
    protected function getStep($request, $flow)
    {
        $flowRepository = new FlowRepository();
        if ($request->has('step_run_id') && intval($request->input('step_run_id'))) {
            //通过 预提交
            $step = $flowRepository->getCurrentStep($request->input('step_run_id'));
        } else {
            //发起 预提交
            $step = $flowRepository->getFlowFirstStep($flow);
        }
        return $step;
    }

    /**
     *过滤request的表单data
     * @param $requestFormData
     * @param $step
     */
    protected function filterRequestFormData(array $requestFormData, $step)
    {
        $hiddenFields = $step->hidden_fields;
        $editableFields = $step->editable_fields;
        //控件key
        $gridKeys = $step->flow->form->grids->pluck('key')->all();
        //包含编辑字段
        $formData = array_only($requestFormData, $editableFields);
        //去除hidden字段
        $formData = $this->exceptRequestFormDataHiddenField($formData, $hiddenFields, $gridKeys);
        return $formData;
    }

    /**
     * 去除hidden 字段
     * @param $requestFormData
     * @param $hiddenFields
     */
    protected function exceptRequestFormDataHiddenField(array $requestFormData, $hiddenFields, array $gridKeys)
    {
        //去除表单hide字段
        $formData = array_except($requestFormData, $hiddenFields);

        //去除控件hidden字段
        if ($hiddenFields) {
            foreach ($hiddenFields as $key => $val) {
                if (preg_match('/^\w+.\*.\w+/', $val) && in_array(explode('.*.', $val)[0], $gridKeys)) {
                    //控件名
                    $gridKey = explode('.*.', $val)[0];
                    //控件字段名
                    $gridField = explode('.*.', $val)[1];
                    $gridCount = count($formData[$gridKey]);
                    for ($i = 0; $i < $gridCount; $i++) {
                        array_forget($formData, $gridKey . '.' . $i . '.' . $gridField);
                    }
                }
            }
        }
        return $formData;
    }

    /**
     * 获取数据库表单data
     * @param $flowRun
     * @param $flow
     * @return array
     */
    protected function getDbFormData($request, $formId)
    {
        if ($request->has('step_run_id') && $request->step_run_id) {
            //流程通过
            $flowRun = StepRun::find($request->step_run_id)->flowRun;
            $dbFormData = $this->formRepository->getFormData($flowRun);
        } else {
            //流程发起
            $dbFormData = [];
        }
        $fields = $this->formRepository->getFields($formId);
        $filterFormData = $this->formData->getFilterFormData($dbFormData, $fields);//获取筛选过后的表单数据
        return $filterFormData;
    }

    /**
     * 替换request的数据到数据库表单data中
     * @param array $requestFormData
     * @param array $dbFormData
     */
    protected function replaceRequestFormDataToDbFormData(array $requestFormData, array $dbFormData)
    {
        foreach ($requestFormData as $k => $v) {
            if (array_has($dbFormData, $k)) {
                $dbFormData[$k] = $v;
            }
        }
        return $dbFormData;
    }


    protected function getNextSteps($step, array $formData)
    {
//        dump($step->toArray(),$formData);
        $stepData = Step::where('flow_id', $step->flow_id)->whereIn('step_key', $step->next_step_key)->get();
        $isNext = false;//下一步是否配置错误
        $nextStep = [];
        foreach ($stepData as $k => $stepItem) {
            $allowCondition = empty($stepItem->allow_condition) ? true : $this->analysisCondition($stepItem->allow_condition, $formData);
            $skipCondition = empty($stepItem->skip_condition) ? false : $this->analysisCondition($stepItem->skip_condition, $formData);
//            $stepItem->approvers = $this->getUserInfo($stepItem->approvers);//获取审批人信息
            //获取下一步骤审批人数据
            $stepItem->approvers = $this->getNextStepApproverUser($stepItem);
            if ($allowCondition && $skipCondition) {//访问条件通过 略过条件true
                if ($stepItem->merge_type == 1 && count($step->next_step_key) > 1) {
                    $isNext = true;
                    break;
                } else {
                    $skipStep = $this->getNextSteps($stepItem, $formData);
                    $nextStep = array_collapse([$nextStep, $skipStep]);
                }
            } elseif ($allowCondition && !$skipCondition) {//访问条件通过  未略过条件
                if ($stepItem->merge_type == 1 && count($step->next_step_key) > 1) {
                    $isNext = true;
                    break;
                } else {
                    $nextStep[] = $stepItem;
                }
            }
        }
        if ($isNext) {
            return [];
        }
        return collect($nextStep);
    }

    /**
     * 访问条件、略过条件判断
     * @param $condition
     * @param array $formData
     */
    protected function analysisCondition($condition, array $formData)
    {
        //解析系统变量
        $value = $this->formData->systemVariate($condition);
        //解析表单字段变量
        $value = $this->formData->formFieldsVariate($value, $formData);
        //解析运算符
        $value = $this->formData->calculation($value);
        if ($value)
            return true;
        return false;
    }

    /**
     * 预提交数据存入缓存
     * @param $formData 表单数据
     * @param $availableStep 下一步审批人数据
     */
    protected function setPresetDataToCache($data)
    {
        $userStaffSn = Auth::id();
        Cache::put(time() . $userStaffSn, $data, 30);
        return time();
    }

    /**
     * 获取预提交数据 并删除
     * @param $timestamp
     */
    public function getPresetData($timestamp)
    {
        $cacheName = $timestamp . Auth::id();
        return Cache::pull($cacheName);
    }

    /**
     * 清楚预提交缓存数据
     * @param $timestamp
     * @throws \Exception
     */
    public function forgetPresetData($timestamp)
    {
        $cacheName = $timestamp . Auth::id();
        Cache::forget($cacheName);
    }
}