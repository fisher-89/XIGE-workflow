<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20/020
 * Time: 11:38
 */

namespace App\Services\Notification;


use App\Services\OA\OaApiService;

trait Message
{
    /**
     * 发送工作通知
     * @param $stepRun
     * @param $formData
     */
    public function sendJobMessage($stepRun, $formData)
    {
        //前三表单data
        $topThreeFormData = $this->getTopThreeFormData($formData, $stepRun->form_id);
        $data = [
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => [$stepRun->approver_sn],
            'msg' => [
                'msgtype' => 'oa',
                'oa' => [
                    'message_url' => request()->get('host') . '/' . $stepRun->id,
                    'head' => [
                        'bgcolor' => '10#ff9800',
                        'text' => '工作流'
                    ],
                    'body' => [
                        'title' => $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '需要你审批',
                        'form' => $topThreeFormData
                    ]
                ]
            ]
        ];

        $oaApiService = new OaApiService();

        try {
            //result 1发送成功 0发送失败
            $result = $oaApiService->sendDingtalkJobNotificationMessage($data);
        } catch (\Exception $e) {

        }
    }
}