<?php
/**
 * 撤回类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6/006
 * Time: 14:35
 */

namespace App\Services\Web;


use App\Models\FlowRun;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class WithdrawService
{
    //钉钉消息
    protected $dingTalkMessage;

    //发起回调
    protected $sendCallback;

    public function __construct(MessageNotification $messageNotification,SendCallbackService $sendCallbackService)
    {
        $this->dingTalkMessage = $messageNotification;
        $this->sendCallback = $sendCallbackService;
    }

    /**
     * 撤回
     * @param $request
     */
    public function withdraw($request)
    {
        $flowRunId = $request->input('flow_run_id');
        $flowRunData = FlowRun::with(['stepRun' => function ($query) {
            $query->whereActionType(0);
        }])->findOrFail($flowRunId);
        DB::transaction(function () use (&$flowRunData) {
            //修改发起状态
            $flowRunData->status = -2;
            $flowRunData->end_at = date('Y-m-d H:i:s');
            $flowRunData->save();
            //修改步骤运行状态
            $flowRunData->stepRun->map(function ($stepRun) {
                $stepRun->action_type = -2;
                $stepRun->acted_at = date('Y-m-d H:i:s');
                $stepRun->save();
            });

            //撤回回调
            $flowRunData->stepRun->each(function ($stepRun) {
                $this->sendCallback->sendCallback($stepRun->id,'step_withdraw');
            });
            try{
                $this->sendMessage($flowRunData);
            }catch(\Exception $e){

            }

        });

        return $flowRunData;
    }

    /**
     * 发送钉钉通知
     * @param $flowRunData
     */
    protected function sendMessage($flowRunData)
    {
        //更新待办
        $flowRunData->stepRun->each(function ($stepRun) {
            $updateTodoResult = $this->dingTalkMessage->updateTodo($stepRun->id);
            abort_if($updateTodoResult == 0,400,'发送更新待办通知失败');
        });
    }
}