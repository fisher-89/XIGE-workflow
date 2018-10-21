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
     * 发送工作通知OA消息
     * @param $stepRun
     * @param $formData
     */
    public function sendJobOaMessage($stepRun, $formData)
    {
        //前三表单data
        $topThreeFormData = $this->getTopThreeFormData($formData, $stepRun->form_id);

        $url = request()->get('host');
        if(str_is('approval?source=dingtalk',$url)){
            $arr = explode('?',$url);
            $url = $arr[0].'/'.$stepRun->id.'?'.$arr[1];
        }else{
            $url = $url.'/'.$stepRun->id;
        }
        $data = [
            'step_run_id'=>$stepRun->id,
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => [$stepRun->approver_sn],
            'msg' => [
                'msgtype' => 'oa',
                'oa' => [
                    'message_url' => $url,
                    'head' => [
                        'bgcolor' => 'FFF44336',
                        'text' => '工作流'
                    ],
                    'body' => [
                        'title' => $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '需要你审批',
                        'form' => $topThreeFormData
                    ]
                ]
            ]
        ];
        $this->sendToOaApi($data);
    }

    /**
     * text 工作通知
     * @param $stepRun
     * @param string $content
     */
    public function sendJobTextMessage($stepRun, $content = '')
    {
        $data = [
            'step_run_id'=>$stepRun->id,
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => [$stepRun->flowRun->creator_sn],
            'to_all_user'=>false,
            'msg' => [
                'msgtype' => 'text',
                'text' => [
                    'content'=>$content
                ]
            ]
        ];
        $this->sendToOaApi($data);
    }

    protected function sendToOaApi($data)
    {
        $oaApiService = new OaApiService();
        try {
            //result 1发送成功 0发送失败
            $result = $oaApiService->sendDingtalkJobNotificationMessage($data);
            return $result;
        } catch (\Exception $e) {

        }
    }
}