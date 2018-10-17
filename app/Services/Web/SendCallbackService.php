<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28/028
 * Time: 9:36
 */

namespace App\Services\Web;


use App\Models\StepRun;
use App\Repository\Web\FormRepository;
use Illuminate\Support\Facades\Auth;

class SendCallbackService
{

    protected $formRepository;

    public function __construct()
    {
        $this->formRepository = new FormRepository;
    }

    /**
     * 发送回调
     * @param int $stepRunId
     * @param string $type
     */
    public function sendCallback(int $stepRunId, string $type)
    {
        $stepRunData = StepRun::find($stepRunId);
        switch ($type) {
            case 'start':
                //流程开始回调
                $this->flowStartCallback($stepRunData);
                break;
            case 'finish':
                //流程结束回调
                $this->flowFinishCallback($stepRunData);
                break;
            case 'step_start':
                //步骤开始回调
                $this->stepStartCallback($stepRunData);
                break;
            case 'step_check':
                //步骤查看回调
                $this->stepCheckCallback($stepRunData);
                break;
            case 'step_agree':
                //步骤通过回调
                $this->stepAgreeCallback($stepRunData);
                break;
            case 'step_reject':
                //步骤驳回回调
                $this->stepRejectCallback($stepRunData);
                break;
            case 'step_deliver':
                //步骤转交回调
                $this->stepDeliverCallback($stepRunData);
                break;
            case 'step_finish':
                //步骤结束回调
                $this->stepFinishCallback($stepRunData);
                break;
            case 'step_withdraw':
                //步骤撤回回调
                $this->stepWithDrawCallback($stepRunData);
                break;
        }

    }

    /**
     * 流程开始回调
     * @param int $stepRunId 步骤运行ID
     */
    protected function flowStartCallback($stepRunData)
    {
        $flowData = $stepRunData->flow()->withTrashed()->first();
        $url = $flowData->start_callback_uri;
        if ($url && is_string($url)) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'start';//回调类型
            $data['time'] = strtotime($stepRunData->flowRun->created_at);
            $result = app('curl')->sendMessageByPost($url, $data);
            //todo 是否处理返回值
        }
    }

    /**
     * 流程结束回调
     * @param $stepRunData
     */
    protected function flowFinishCallback($stepRunData)
    {
        $flowData = $stepRunData->flow()->withTrashed()->first();
        $url = $flowData->end_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'finish';
            $data['time'] = strtotime($stepRunData->flowRun->end_at);
            $data['result'] = $stepRunData->flowRun->status == 1 ? 'agree' : 'refuse';
            $result = app('curl')->sendMessageByPost($url, $data);
            //todo 是否处理返回值
        }
    }

    /**
     * 步骤开始回调
     * @param $stepRunData
     */
    protected function stepStartCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->start_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_start';
            $data['time'] = strtotime($stepRunData->created_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤查看回调
     * @param $stepRunData
     */
    protected function stepCheckCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->check_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_check';
            $data['time'] = strtotime($stepRunData->checked_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤通过回调
     * @param $stepRunData
     */
    protected function stepAgreeCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->approve_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_agree';
            $data['time'] = strtotime($stepRunData->acted_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤驳回回调
     * @param $stepRunData
     */
    protected function stepRejectCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->reject_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_reject';
            $data['time'] = strtotime($stepRunData->acted_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤转交回调
     * @param $stepRunData
     */
    protected function stepDeliverCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->transfer_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_deliver';
            $data['time'] = strtotime($stepRunData->acted_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤结束回调
     * @param $stepRunData
     */
    protected function stepFinishCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->end_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_finish';
            $data['time'] = strtotime($stepRunData->acted_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 步骤撤回回调
     * @param $stepRunData
     */
    protected function stepWithDrawCallback($stepRunData)
    {
        $stepData = $stepRunData->steps()->withTrashed()->first();
        $url = $stepData->withdraw_callback_uri;
        if ($url) {
            $data = $this->getCallbackData($stepRunData);
            $data['type'] = 'step_withdraw';
            $data['time'] = strtotime($stepRunData->acted_at);
            $result = app('curl')->sendMessageByPost($url, $data);
        }
    }

    /**
     * 回调返回的数据
     * @param int $stepRunData
     * @return array
     */
    protected function getCallbackData($stepRunData)
    {
        $data['create_sn'] = $stepRunData->flowRun->creator_sn;
        $data['create_name'] = $stepRunData->flowRun->creator_name;
        $data['approver_sn'] = Auth::id();
        $data['approver_name'] = Auth::user()->realname;
        $data['step_run_id'] = $stepRunData->id;
        $data['flow_id'] = $stepRunData->flow_id;
        $data['flow_name'] = $stepRunData->flow_name;
        $data['remark'] = $stepRunData->remark;
        $data['flow_run_id'] = $stepRunData->flow_run_id;
        $data['process_instance_id'] = $stepRunData->flowRun->process_instance_id;//审批实例ID
        $formData = $this->formRepository->getFormData($stepRunData->flowRun);
        $data['data'] = $formData;
        return $data;
    }

    /**
     * 获取表单数据
     * @param $formId
     * @param $dataId
     * @return array
     */
//    protected function getFormData($formId, $dataId)
//    {
//        $formGridKey = FormGrid::where('form_id', $formId)->pluck('key')->all();
//        //表单数据
//        $formData = DB::table('form_data_' . $formId)->find($dataId);
//        $formData = collect($formData)->all();
//        if (!empty($formGridKey)) {
//            //表单控件数据
//            array_map(function ($key) use (&$formData, $formId) {
//                $gridData = DB::table('form_data_' . $formId . '_' . $key)->where('data_id', $formData['id'])->get();
//                $formData[$key] = json_decode(json_encode($gridData), true);
//            }, $formGridKey);
//        }
//        return $formData;
//    }
}