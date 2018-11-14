<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20/020
 * Time: 11:38
 */

namespace App\Services\Notification;


use App\Models\StepCc;
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
        if (str_is('*approve?source=dingtalk', $url)) {
            $arr = explode('?', $url);
            $url = $arr[0] . '/' . $stepRun->id . '?' . $arr[1];
        } else {
            $url = $url . '/' . $stepRun->id;
        }
        $title = $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '需要你审批';
        $data = $this->getSendData($stepRun->id,[$stepRun->approver_sn],$url,$title,$topThreeFormData);
//        $data = [
//            'step_run_id' => $stepRun->id,
//            'oa_client_id' => config('oa.client_id'),
//            'userid_list' => [$stepRun->approver_sn],
//            'msg' => [
//                'msgtype' => 'oa',
//                'oa' => [
//                    'message_url' => $url,
//                    'head' => [
//                        'bgcolor' => 'FFF44336',
//                        'text' => '工作流'
//                    ],
//                    'body' => [
//                        'title' => $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '需要你审批',
//                        'form' => $topThreeFormData
//                    ]
//                ]
//            ]
//        ];
        return $this->sendToOaApi($data);
    }

    /**
     * 获取发送的data
     * @param int $stepRunId
     * @param array $userList
     * @param string $messageUrl
     * @param string $title
     * @param array $formData
     * @return array
     */
    protected function getSendData(int $stepRunId,array $userList,string $messageUrl,string $title,array $formData)
    {
        $data = [
            'step_run_id' => $stepRunId,
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => $userList,
            'msg' => [
                'msgtype' => 'oa',
                'oa' => [
                    'message_url' => $messageUrl,
                    'head' => [
                        'bgcolor' => 'FFF44336',
                        'text' => '工作流'
                    ],
                    'body' => [
                        'title' => $title,
                        'form' => $formData
                    ]
                ]
            ]
        ];
        return $data;
    }
    /**
     * text 工作通知
     * @param $stepRun
     * @param string $content
     */
    public function sendJobTextMessage($stepRun, $content = '')
    {
        $data = [
            'step_run_id' => $stepRun->id,
            'oa_client_id' => config('oa.client_id'),
            'userid_list' => [$stepRun->flowRun->creator_sn],
            'to_all_user' => false,
            'msg' => [
                'msgtype' => 'text',
                'text' => [
                    'content' => $content
                ]
            ]
        ];
        return $this->sendToOaApi($data);
    }

    /**
     * 发送抄送人OA工作通知信息
     * @param $stepRun
     * @param array $formData
     * @param int $staffSn
     * @return mixed
     */
    public function sendCcJobOaMessage($stepRun,array $formData,int $staffSn)
    {
        //前三表单data
        $topThreeFormData = $this->getTopThreeFormData($formData, $stepRun->form_id);
        $stepCc = StepCc::where(['step_run_id'=>$stepRun->id,'staff_sn'=>$staffSn])->first();
        $url = request()->get('cc_host');
        if (str_is('*cc_detail?source=dingtalk', $url)) {
            $arr = explode('?', $url);
            $url = $arr[0] . '/' . $stepCc->id . '?' . $arr[1];
        } else {
            $url = $url . '/' . $stepCc->id;
        }
        $title = $stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name . '的流程下'.$stepRun->step_name.'的步骤的数据，'.date('Y-m-d H:i:s').'抄送给你了';

        $data = $this->getSendData($stepRun->id,[$staffSn],$url,$title,$topThreeFormData);
        return $this->sendToOaApi($data);
    }

    protected function sendToOaApi($data)
    {
        $oaApiService = new OaApiService();
        //result 1发送成功 0发送失败
        $result = $oaApiService->sendDingtalkJobNotificationMessage($data);
        return $result;
    }
}