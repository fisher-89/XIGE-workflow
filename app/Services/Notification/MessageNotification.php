<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17/017
 * Time: 14:15
 */

namespace App\Services\Notification;


use App\Services\OA\OaApiService;

class MessageNotification
{
    protected $sendMessage;

    public function __construct()
    {
        $oaApiService = new OaApiService();
        $this->sendMessage = $oaApiService;
    }

    /**
     * 发送消息给待审批人
     * @param $currentStepRunData  当前步骤运行数据
     * @param $nextStepRunData  下一步骤运行数据
     */
    public function sendPendingApprovalMessage($currentStepRunData, $nextStepRunData)
    {
        $nextStepRunData->each(function ($stepRun) use ($currentStepRunData) {
            $text = $currentStepRunData->flowRun->creator_name . $currentStepRunData->flowRun->created_at . '提交的' . $currentStepRunData->flowRun->name . '流程';
            $message = [
                'oa_client_id' => config('oa.client_id'),
                'userid_list' => [$stepRun->approver_sn],
                'msg' => [
                    'msgtype' => 'link',
                    'link' => [
                        'title' => $currentStepRunData->approver_name . '的' . $currentStepRunData->flow_name . '需要你审批',
                        'text' => $text,
                        'messageUrl' => 'http://' . request()->header('host'),
                        'picUrl' => 'http://' . request()->header('host')
                    ]
                ]
            ];
            $this->sendMessage->sendDingtalkJobNotificationMessage($message);
        });
    }

    /**
     * 发起待办消息（钉钉）
     * @param $currentStepRunData
     * @param $nextStepRunData
     */
    public function sendDingtalkTodoMessage($currentStepRunData,$nextStepRunData)
    {
        $nextStepRunData->map(function ($stepRun) use($currentStepRunData) {
            $message = [
                'userid' => $stepRun->approver_sn,
                'create_time' => strtotime($stepRun->created_at) . '000',
                'title' =>$stepRun->flowRun->creator_name.'发起的'.$stepRun->flow_name.'流程需要你审批',
                'url'=>'http://'.request()->header('host'),
                'formItemList'=>[
                    [
                        'title'=>'发起人：',
                        'content'=>$stepRun->flowRun->creator_name
                    ],
                    [
                        'title'=>'发起时间：',
                        'content'=>$stepRun->flowRun->created_at
                    ],
                    [
                        'title'=>'审批人：',
                        'content'=>$currentStepRunData->approver_name
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
                //result 1发送成功 0发送失败
                $result = $this->sendMessage->sendAddTodoMessage($message);
            }catch(\Exception $exception){

            }

        });
    }

    /**
     * 发送消息给流程发起人
     * @param $currentStepRunData 当前步骤运行数据
     */
    public function sendInitiateMessage($currentStepRunData)
    {
        $message = [
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => [$currentStepRunData->flowRun->creator_sn],
            'msg' => [
                'msgtype' => 'oa',
                'oa' => [
                    'head' => [
                        'title' => '你的' . $currentStepRunData->flow_name . '流程已审批通过了'
                    ],
                    'body' => [
                        'content' => '审批人:' . $currentStepRunData->approver_name
                    ]
                ]
            ]
        ];
        $this->sendMessage->sendDingtalkJobNotificationMessage($message);
    }
}