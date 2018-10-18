<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15/015
 * Time: 11:02
 */

namespace App\Services\Notification;


use App\Services\OA\OaApiService;

trait Todo
{
    /**
     * 发送待办消息
     * @param $nextStepRunData
     * @param $formData
     */
    public function sendTodoMessage($nextStepRunData,$formData)
    {
        $nextStepRunData->each(function ($stepRun) use ($formData) {
            $this->sendTodoMessageToDingTalk($stepRun,$formData);
        });
    }

    protected function sendTodoMessageToDingTalk($stepRun,array $formData)
    {
        //前三表单data
        $topThreeFormData = $this->getTopThreeFormData($formData,$stepRun->form_id);
        $data = [
            'userid' => $stepRun->approver_sn,
            'create_time' => strtotime($stepRun->created_at) . '000',
            'title' => $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '流程需要你审批',
            'url' => request()->get('host') . '/' . $stepRun->id,
            'formItemList' => $topThreeFormData,
            'step_run_id' => $stepRun->id,
            'callback' => route('todo'),
        ];
        try {
            $oaApiService = new OaApiService();
            //result 1发送成功 0发送失败
            $result = $oaApiService->sendAddTodoMessage($data);
        } catch (\Exception $e) {

        }
    }
}