<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9/009
 * Time: 15:29
 */

namespace App\Services\Web;


use App\Models\StepRun;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class RejectService
{
    //发起回调
    protected $sendCallback;

    public function __construct()
    {
        $this->sendCallback = new SendCallbackService();
    }

    /**
     *驳回
     * @param $request
     * @return mixed
     */
    public function reject($request)
    {
        DB::transaction(function () use ($request, &$stepRunData) {
            $stepRunData = StepRun::find($request->input('step_run_id'));
            $rejectType = (int)$stepRunData->steps->reject_type;//退回类型
            //检测是否可以退回
            if ($rejectType == 0)
                abort(400, '当前步骤不能进行驳回处理');
            $stepRunData->action_type = -1;
            $stepRunData->acted_at = date('Y-m-d H:i:s');
            $stepRunData->remark = trim($request->input('remark'));
            $stepRunData->save();

            $stepRunData->flowRun->status = -1;
            $stepRunData->flowRun->end_at = date('Y-m-d H:i:s');
            $stepRunData->flowRun->save();

            //步骤驳回回调
            $this->sendCallback->sendCallback($stepRunData->id,'step_reject');
            //流程结束回调
            $this->sendCallback->sendCallback($stepRunData->id,'finish');

            //发送通知
            try{
                $this->sendMessage($stepRunData);
            }catch(\Exception $e){

            }

        });
        return $stepRunData;
    }

    protected function sendMessage($stepRunData)
    {
        //更新待办
        $dingTalkMessage = new MessageNotification();
        $updateTodoResult = $dingTalkMessage->updateTodo($stepRunData->id);
        abort_if($updateTodoResult == 0,400,'发送更新待办通知失败');

        //发送text 工作通知 给发起人
        $flowIsSendMessage = $stepRunData->flow->send_message;
        if (config('oa.is_send_message') && $flowIsSendMessage && $stepRunData->steps->send_start) {
            $content = '你发起的' . $stepRunData->flow_name . '的流程被' . $stepRunData->approver_name . '驳回了';
            $result = $dingTalkMessage->sendJobTextMessage($stepRunData, $content);
            abort_if($result == 0, 400, '发送工作通知失败');
        }
    }
}