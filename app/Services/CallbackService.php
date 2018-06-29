<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28/028
 * Time: 9:36
 */

namespace App\Services;


class CallbackService
{

    /**
     * 查看回调
     * @param $data
     */
    public function checkCallback($data)
    {
        $uri = $data['step']['check_callback_uri'];
        $sendData = [
            'step_id' => $data['step_run']['step_id'],
            'step_name' => $data['step_run']['step_name'],
            'step_key' => $data['step_run']['step_key'],
            'flow_run_id' => $data['step_run']['flow_run_id'],
            'flow_run_name' => $data['flow_run']['name'],
            'operator_sn' => $data['step_run']['approver_sn'],
            'operator_name' => $data['step_run']['approver_name'],
            'operator_type' => $data['step_run']['action_type'],
            'operator_checked_at' => $data['step_run']['checked_at'],
            'operator_at' => $data['step_run']['acted_at'],
            'form_data' => $data['form_data'],
        ];
        if (!empty($uri))
            app('curl')->sendMessageByPost($uri, $sendData);
    }

    /**
     * 开始回调
     * @param $flowRunData
     */
    public function startCallback($flowRunData, Array $formData)
    {
        $uri = $flowRunData->stepRun->steps->start_callback_uri;
        $sendData = [
            'flow_run_id' => $flowRunData->id,
            'flow_run_name' => $flowRunData->name,
            'operator_sn' => $flowRunData->creator_sn,
            'operator_name' => $flowRunData->creator_name,
            'operator_status' => $flowRunData->status,
            'operator_at' => $flowRunData->created_at,
            'form_data' => $formData,
        ];
        if (!empty($uri))
            app('curl')->sendMessageByPost($uri, $sendData);
    }

    /**
     * 通过回调
     * @param $stepRunData
     * @param $formData
     */
    public function approveCallback($stepRunData, $formData)
    {
        $uri = $stepRunData->steps->approve_callback_uri;
        $sendData = [
            'step_id' => $stepRunData->step_id,
            'step_name' => $stepRunData->step_name,
            'step_key' => $stepRunData->step_key,
            'flow_run_id' => $stepRunData->flow_run_id,
            'flow_run_name' => $stepRunData->flowRun->name,
            'operator_sn' => $stepRunData->approver_sn,
            'operator_name' => $stepRunData->approver_name,
            'operator_type' => $stepRunData->action_type,
            'operator_checked_at' => $stepRunData->checked_at,
            'operator_at' => $stepRunData->acted_at,
            'form_data' => $formData,
        ];
        if (!empty($uri))
            app('curl')->sendMessageByPost($uri, $sendData);
    }

    /**
     * 驳回回调
     * @param $stepRunData
     */
    public function rejectCallback($stepRunData)
    {
        $uri = $stepRunData->steps->reject_callback_uri;
        $sendData = [
            'step_id' => $stepRunData->step_id,
            'step_name' => $stepRunData->step_name,
            'step_key' => $stepRunData->step_key,
            'flow_run_id' => $stepRunData->flow_run_id,
            'flow_run_name' => $stepRunData->flowRun->name,
            'operator_sn' => $stepRunData->approver_sn,
            'operator_name' => $stepRunData->approver_name,
            'operator_type' => $stepRunData->action_type,
            'operator_checked_at' => $stepRunData->checked_at,
            'operator_at' => $stepRunData->acted_at,
            'remark' => $stepRunData->remark,
        ];
        if (!empty($uri))
            app('curl')->sendMessageByPost($uri, $sendData);
    }

    /**
     * 转交回调
     * @param $stepRunData
     */
    public function transferCallback($stepRunData)
    {
        $uri = $stepRunData->steps->transfer_callback_uri;
        $sendData = [
            'step_id' => $stepRunData->step_id,
            'step_name' => $stepRunData->step_name,
            'step_key' => $stepRunData->step_key,
            'flow_run_id' => $stepRunData->flow_run_id,
            'flow_run_name' => $stepRunData->flowRun->name,
            'operator_sn' => $stepRunData->approver_sn,
            'operator_name' => $stepRunData->approver_name,
            'operator_type' => $stepRunData->action_type,
            'operator_checked_at' => $stepRunData->checked_at,
            'operator_at' => $stepRunData->acted_at,
            'remark' => $stepRunData->remark,
        ];
        if (!empty($uri))
            app('curl')->sendMessageByPost($uri, $sendData);
    }
}