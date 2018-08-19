<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/14/014
 * Time: 17:47
 */

namespace App\Services\Web;


use App\Models\StepRun;
use App\Repository\Web\FlowRepository;
use App\Repository\Web\FormRepository;
use App\Services\Notification\MessageNotification;

class ActionService
{

    protected $formRepository;
    protected $message;//发送钉钉消息

    public function __construct(MessageNotification $messageNotification)
    {
        $this->formRepository = new FormRepository();
        $this->message = $messageNotification;
    }

    /**
     * 预提交处理
     * @param $request
     * @param $flow
     */
    public function preset($request, $flow)
    {
        $requestFormData = $request->input('form_data');
        $step = $this->getStep($request, $flow);//步骤数据
        $filterRequestFormData = $this->filterRequestFormData($requestFormData, $step);//过滤request表单data
        $dbFormData = $this->getEditableDbFormData($request, $step->editable_fields, $flow->form_id);//获取数据库可写的表单数据

        //替换数据库的表单data数据
        $formData = $this->formRepository->replaceFormData($filterRequestFormData, $dbFormData);

        $fields = $this->formRepository->getOnlyEditableFields($step->editable_fields, $flow->form_id);//获取可写字段信息
        $filterFormData = app('formData')->getFilterFormData($formData, $fields);//获取筛选过后的表单数据

        $nextStep = [];
        if (empty($step->next_step_key)) {
            //结束流程
            $step_end = 1;
        } else {
            //流程未结束  获取下一步骤数据
            $step_end = 0;
            $nextStep = app('preset')->getNextStep($step, $filterFormData);//下一步数据
            if (empty($nextStep)) {
                abort(400,'该步骤为合并类型，后台配置错误，只能有一个审批步骤');
            }

            $nextStep = $nextStep->map(function ($field) {
                return $field->only(['id', 'name', 'approvers']);
            })->toArray();

        }
        $cacheData = [
            'form_data' => $filterFormData,//表单data数据
            'available_steps' => $nextStep,//下一步骤数据
            'step_end' => $step_end,//是否结束步骤
            'concurrent_type' => $step->concurrent_type,//步骤并发类型
            'step_run_id' => $request->input('step_run_id')//步骤运行ID
        ];
        $timestamp = app('preset')->setPresetDataToCache($cacheData);//预提交数据存入cache
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
     *过滤request的表单data
     * @param $requestFormData
     * @param $step
     */
    protected function filterRequestFormData(array $requestFormData, $step)
    {
        $hiddenFields = $step->hidden_fields;
        $editableFields = $step->editable_fields;
        $formData = $this->exceptHiddenFormData($hiddenFields, $requestFormData);//去除hidden_fields数据
        $formData = $this->onlyEditableFormData($editableFields, $formData);//包含可写字段数据
        return $formData;
    }

    /**
     * 过滤去除Request表单hidden字段
     * @param $hiddenFields
     * @param array $requestFormData
     */
    protected function exceptHiddenFormData($hiddenFields, array $requestFormData)
    {
        $data = [];
        foreach ($requestFormData as $k => $v) {
            if (is_array($v) && $v) {
                //控件字段过滤
                foreach ($v as $gridKey => $gridValue) {
                    if (is_array($gridValue) && $gridValue) {
                        foreach ($gridValue as $field => $fieldValue) {
                            $fieldName = $k . '.*.' . $field;
                            if ((!in_array($fieldName, $hiddenFields))) {
                                $data[$k][$gridKey][$field] = $fieldValue;
                            }
                        }
                    } else {
                        //不是控件（文件数据）
                        $data[$k] = $v;
                    }
                }
            } else {
                //表单字段过滤
                if (!in_array($k, $hiddenFields)) {
                    $data[$k] = $v;
                }
            }
        }
        return $data;
    }

    /**
     * 取出包含可写字段的formData
     * @param $editableFields
     * @param $formData
     */
    protected function onlyEditableFormData($editableFields, $formData)
    {
        $data = [];
        foreach ($formData as $k => $v) {
            if (is_array($v) && $v) {
                //控件字段过滤
                foreach ($v as $gridKey => $gridValue) {
                    if (is_array($gridValue) && $gridValue) {
                        foreach ($gridValue as $field => $fieldValue) {
                            $fieldName = $k . '.*.' . $field;
                            if (in_array($fieldName, $editableFields) || $field == 'id') {
                                $data[$k][$gridKey][$field] = $fieldValue;
                            }
                        }
                    } else {
                        //表单字段过滤(文件数组数据)
                        $data[$k] = $v;
                    }
                }
            } else {
                //表单字段过滤
                if (in_array($k, $editableFields)) {
                    $data[$k] = $v;
                }
            }
        }
        return $data;
    }

    /**
     * 获取数据库可写的表单data数据
     * @param $request
     * @param $editableFields
     */
    protected function getEditableDbFormData($request, $editableFields, $formId)
    {
        $allDatabaseFormData = $this->getDatabaseFormData($request);
        $fields = $this->formRepository->getOnlyEditableFields($editableFields, $formId);
        $filterDatabaseFormData = app('formData')->getFilterFormData($allDatabaseFormData, $fields);//获取筛选过后的表单数据
        return $filterDatabaseFormData;
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
     * 获取数据库的formData
     * @param $request
     * @return array
     */
    protected function getDatabaseFormData($request)
    {
        if ($request->has('step_run_id') && intval($request->input('step_run_id'))) {
            $flowRunId = StepRun::find($request->input('step_run_id'))->flow_run_id;
            $formData = $this->formRepository->getFormData($flowRunId);//获取表单data数据
        } else {
            $formData = $this->formRepository->getFormData();//获取表单data数据
        }
        return $formData;
    }

    /**
     * 流程发起处理
     * @param $request
     */
    public function start($request, $flow)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'));
        if (!$cacheFormData)
            abort(404, '预提交数据已失效，请重新提交数据');
        $this->checkStartRequest($request, $cacheFormData);//检测审批人数据与step_run_id是否正确、缓存是否失效

        $stepRunData = app('start')->startSave($request, $flow);//发起保存
        app('preset')->forgetPresetData($request->input('timestamp'));//清楚预提交缓存数据
        //发送钉钉待办消息
        $this->message->sendDingtalkTodoMessage($stepRunData['current_step_run_data'],$stepRunData['next_step_run_data']);

        return $stepRunData;
    }

    /**
     * 检测发起数据
     * @param $request
     */
    public function checkStartRequest($request, $cacheData)
    {
        if ($cacheData['step_run_id'] != $request->input('step_run_id')) {
            abort(400, '步骤运行ID与提交数据不一致');
        }
        if (!empty($cacheData['available_steps'])) {
            $availableStepStaffSn = [];//下一步审批人编号
            foreach ($cacheData['available_steps'] as $v) {
                foreach ($v['approvers'] as $step) {
                    $availableStepStaffSn[] = $step['staff_sn'];
                }
            }
            //检测提交的下一步审批人是否在审批人中
            foreach ($request->input('next_step') as $v) {
                if (!in_array($v['approver_sn'], $availableStepStaffSn)) {
                    abort(400, $v['approver_name'] . '不在下一步审批人中');
                }
            }
        }
    }
}