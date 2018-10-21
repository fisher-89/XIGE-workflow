<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9/009
 * Time: 15:29
 */

namespace App\Services\Web;


use App\Models\StepRun;
use App\Jobs\SendCallback;
use App\Services\Notification\MessageNotification;

class RejectService
{
    /**
     *驳回
     * @param $request
     * @return mixed
     */
    public function reject($request)
    {
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
        SendCallback::dispatch($stepRunData->id, 'step_reject');
        //流程结束回调
        SendCallback::dispatch($stepRunData->id, 'finish');
        //更新待办
        $dingTalkMessage = new MessageNotification();
        $dingTalkMessage->updateTodo($stepRunData->id);

        //发送text 工作通知
        $content = '你发起的'.$stepRunData->flow_name.'的流程被'.$stepRunData->approver_name.'驳回了';
        $dingTalkMessage->sendJobTextMessage($stepRunData,$content);

        return $stepRunData;
    }
}