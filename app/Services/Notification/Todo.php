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
     * @param $currentStepRun
     * @param $nextStepRunData
     */
    public function sendTodoMessage($currentStepRun, $nextStepRunData)
    {
        $nextStepRunData->each(function ($stepRun) use ($currentStepRun) {
            $this->sendTodoMessageToDingTalk($stepRun);
        });
    }

    protected function sendTodoMessageToDingTalk($stepRun, $currentStepRun)
    {
        $createName = $currentStepRun->flowRun->creator_name;
        $data = [
            'userid' => $stepRun->approver_sn,
            'create_time' => strtotime($stepRun->create_at) . '000',
            'title' => $createName . '发起的' . $stepRun->flow_name . '流程需要你审批',
            'url' => 'http://' . request()->header('host') . '/approvelist?type=processing&page=1',
            'formItemList'=>[
                [
                    'title'=>'发起时间：',
                    'content'=>$currentStepRun->flowRun->created_at
                ],
                [
                    'title'=>'审批人：',
                    'content'=>$currentStepRun->approver_name
                ],
                [
                    'title'=>'提交时间：',
                    'content'=>$stepRun->created_at
                ]
            ],
            'step_run_id'=>$stepRun->id,
            'callback'=>route('todo'),
        ];
        try{
            $oaApiService = new OaApiService();
            //result 1发送成功 0发送失败
            $result = $oaApiService->sendAddTodoMessage($data);
        }catch(\Exception $e){

        }
    }
}