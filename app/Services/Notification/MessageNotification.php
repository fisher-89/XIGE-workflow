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
    //待办
    use Todo;

    protected $oaApiService;

    public function __construct()
    {
        $this->oaApiService = new OaApiService();
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
            $this->oaApiService->sendDingtalkJobNotificationMessage($message);
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
        $this->oaApiService->sendDingtalkJobNotificationMessage($message);
    }
}