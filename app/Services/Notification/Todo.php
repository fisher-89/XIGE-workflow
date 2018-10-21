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
    public function sendTodoMessage($stepRun,array $formData)
    {
        //前三表单data
        $topThreeFormData = $this->getTopThreeFormData($formData,$stepRun->form_id);
        $topThreeFormData = array_map(function($item){
            $arr['title'] = $item['key'];
            $arr['content'] = $item['value'];
            return $arr;
        },$topThreeFormData);
        $url = request()->get('host');
        if(str_is('approval?source=dingtalk',$url)){
            $arr = explode('?',$url);
            $url = $arr[0].'/'.$stepRun->id.'?'.$arr[1];
        }else{
            $url = $url.'/'.$stepRun->id;
        }
        $data = [
            'userid' => $stepRun->approver_sn,
            'create_time' => strtotime($stepRun->created_at) . '000',
            'title' => '工作流:'.$stepRun->flowRun->creator_name . '发起的' . $stepRun->flow_name,
            'url' => $url,
            'formItemList' => $topThreeFormData,
            'step_run_id' => $stepRun->id,
        ];
        try {
            $oaApiService = new OaApiService();
            //result 1发送成功 0发送失败
            $result = $oaApiService->sendAddTodoMessage($data);
            $stepRun->is_send_todo = $result;
            $stepRun->save();
        } catch (\Exception $e) {

        }
    }

    /**
     * 更新待办信息
     * @param $stepRun
     */
    public function updateTodo($stepRunId)
    {
        $data = [
            'step_run_id' => $stepRunId,
        ];
        try{
            $oaApiService = new OaApiService();
            $result = $oaApiService->updateTodo($data);
        }catch(\Exception $e){

        }

    }
}