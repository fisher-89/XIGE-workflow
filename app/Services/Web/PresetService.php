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
use App\Repository\Web\FlowRepository;
use App\Repository\Web\FormRepository;
use App\Services\OA\OaApiService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PresetService
{
    protected $formData;
    protected $formRepository;
    public function __construct(FormDataService $formDataService,FormRepository $formRepository)
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
//        dump($requestFormData, $step->toArray(),11111111);
        //过滤request表单data
        $filterRequestFormData = $this->filterRequestFormData($requestFormData, $step);
        //获取数据库表单data
        $dbFormData = $this->getDbFormData($step->flowRun,$flow);
        //替换数据库表单数据
        $newDbFormData = $this->replaceRequestFormDataToDbFormData($filterRequestFormData,$dbFormData);
        //获取表单字段（含控件）
        $fields = $this->formRepository->getFields($flow->form_id);
        //计算表单的值（运算符号、字段类型、系统变量）
        $formData = $this->formData->getFilterFormData($newDbFormData,$fields);

        $nextStep = [];
        if (empty($step->next_step_key)) {
            //结束流程
            $step_end = 1;
        } else {
            //流程未结束  获取下一步骤数据
            $step_end = 0;
            $nextStep= $this->getNextSteps($step, $formData);
            if (empty($nextStep)) {
                abort(400,'该步骤为合并类型，后台配置错误，只能有一个审批步骤');
            }

            $nextStep  = $nextStep->map(function ($field) {
                return $field->only(['id', 'name', 'approvers']);
            })->all();
        }
        $cacheData = [
            'form_data' => $formData,//表单data数据
            'available_steps' => $nextStep,//下一步骤数据
            'step_end' => $step_end,//是否结束步骤
            'concurrent_type' => $step->concurrent_type,//步骤并发类型
            'step_run_id' => $request->input('step_run_id')//步骤运行ID
        ];
        $timestamp = $this->setPresetDataToCache($cacheData);//预提交数据存入cache
        $responseData = [
            'available_steps' => $nextStep,
            'step_end' => $step_end,
            'timestamp' => $timestamp,
            'concurrent_type' => $step->concurrent_type,
            'flow_id' => $flow->id,
            'step_run_id' => $request->input('step_run_id')//步骤运行ID
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
                    for ($i = 0; $i < $gridCount; $i++){
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
    protected function getDbFormData($flowRun,$flow)
    {
        if($flowRun){
            //流程通过
            $dbFormData = $this->formRepository->getFormData($flowRun);
        }else{
            //流程发起
            $dbFormData = [];
        }
        $fields = $this->formRepository->getFields($flow->form_id);
        $filterFormData = $this->formData->getFilterFormData($dbFormData, $fields);//获取筛选过后的表单数据
        return $filterFormData;
    }

    /**
     * 替换request的数据到数据库表单data中
     * @param array $requestFormData
     * @param array $dbFormData
     */
    protected function replaceRequestFormDataToDbFormData(array $requestFormData,array $dbFormData)
    {
        foreach ($requestFormData as $k=>$v) {
            if(array_has($dbFormData,$k)){
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
            $stepItem->approvers = $this->getUserInfo($stepItem->approvers);//获取审批人信息
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
    protected function analysisCondition($condition,array $formData)
    {
        //解析系统变量
        $value = $this->formData->systemVariate($condition);
        //解析表单字段变量
        $value = $this->formData->formFieldsVariate($value,$formData);
        //解析运算符
        $value = $this->formData->calculation($value);
        if($value)
            return true;
        return false;
    }

    /**
     * 从OA获取人员数据
     * @param $data
     * staff 员工编号 array
     * roles 角色ID   array
     * departments 部门ID array
     */
    public function getUserInfo(array $data)
    {
        $filters = 'filters=';
        if (!empty($data['staff']))
            $filters .= 'staff_sn=['.implode(',',$data['staff']).']|';
        if (!empty($data['roles'])) {
            $filters .= 'roles.id=['.implode(',',$data['roles']).']|';
        }
        if (!empty($data['departments']))
            $filters .= 'department_id=['.implode(',',$data['departments']).']|';
        $filters = rtrim($filters,'|');
        $oaApiService = new OaApiService();
        $response = $oaApiService->getStaff($filters);
        $userData = $this->filterUserInfo($response);//筛选字段
        $userData = $this->userDistinct($userData);//去除重复的员工
        return $userData;
    }

    /**
     * 过滤用户字段数据
     * @param $user
     */
    protected function filterUserInfo($user)
    {
        $data = array_map(function ($item) {
            $user = [];
            $user['staff_sn'] = $item['staff_sn'];
            $user['realname'] = $item['realname'];
            $user['department_id'] = $item['department']['id'];
            $user['department_full_name'] = $item['department']['full_name'];
            $user['position_name'] = $item['position']['name'];
            return $user;
        }, $user);
        return $data;
    }

    /**
     * 员工数据去重
     * @param $user
     */
    protected function userDistinct($user)
    {
        $staff = [];
        $data = array_map(function ($item) use (&$staff) {
            if (!in_array($item['staff_sn'], $staff)) {
                $staff[] = $item['staff_sn'];
                return $item;
            }

        }, $user);
        $data = array_merge(array_filter($data));//去除空值与重新排序
        return $data;
    }

    /**
     * 预提交数据存入缓存
     * @param $formData 表单数据
     * @param $availableStep 下一步审批人数据
     */
    public function setPresetDataToCache($data)
    {
        $userStaffSn = Auth::id();
        Cache::put(time() . $userStaffSn, $data, 10);
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

    /*------------------------------------------------------------------------*/
    /**
     *获取下一步骤数据
     * @param $step
     * @param $formData
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getNextStep($step, array $formData)
    {
        $stepData = Step::where('flow_id', $step->flow_id)->whereIn('step_key', $step->next_step_key)->get();
        $isNext = false;//下一步是否配置错误
        $nextStep = [];
        foreach ($stepData as $k => $stepItem) {
            $allowCondition = empty($stepItem->allow_condition) ? true : app('formData')->analysisDefaultValueVariate($stepItem->allow_condition, $formData);
            $skipCondition = empty($stepItem->skip_condition) ? false : app('formData')->analysisDefaultValueVariate($stepItem->skip_condition, $formData);
            $stepItem->approvers = $this->getUserInfo($stepItem->approvers);//获取审批人信息
            if ($allowCondition && $skipCondition) {//访问条件通过 略过条件true
                if ($stepItem->merge_type == 1 && count($step->next_step_key) > 1) {
                    $isNext = true;
                    break;
                } else {
                    $skipStep = $this->getNextStep($stepItem, $formData);
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





}