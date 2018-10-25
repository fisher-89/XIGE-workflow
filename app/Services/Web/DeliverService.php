<?php
/**
 * 转交
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14/014
 * Time: 11:47
 */

namespace App\Services\Web;


use App\Jobs\SendCallback;
use App\Models\StepRun;
use App\Repository\Web\FormRepository;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class DeliverService
{
    protected $formRepository;
    protected $dingTalkMessage;

    public function __construct(FormRepository $formRepository, MessageNotification $messageNotification)
    {
        $this->formRepository = $formRepository;
        $this->dingTalkMessage = $messageNotification;
    }

    /**
     * 转交处理
     * @param $request
     */
    public function deliver($request)
    {
        $stepRun = StepRun::find($request->input('step_run_id'));
        DB::transaction(function () use ($request, $stepRun, &$deliverData) {
            $stepRun->action_type = 3;
            $stepRun->acted_at = date('Y-m-d H:i:s');
            $stepRun->remark = trim($request->input('remark'));
            $stepRun->save();
            $stepRunData = array_except($stepRun->toArray(), ['id', 'approver_sn', 'approver_name', 'acted_at', 'created_at', 'updated_at', 'deleted_at']);
            $data = $stepRunData;
            $data['action_type'] = 0;
            $data = array_collapse([$data, $request->only(['approver_sn', 'approver_name'])]);
            $deliverData = StepRun::create($data);
        });
        //触发转交回调
        SendCallback::dispatch($deliverData->id, 'step_deliver');

        //更新待办
        $dingTalkMessage = new MessageNotification();
        $dingTalkMessage->updateTodo($stepRun->id);

        //发送钉钉消息（发送给下一步审批人）
        $this->sendMessage($deliverData,$stepRun->approver_name);
        return $deliverData;
    }

    /**
     * 发送消息
     * @param $stepRun
     */
    protected function sendMessage($stepRun,string $approverName)
    {
        //表单Data
        $formData = $this->formRepository->getFormData($stepRun->flow_run_id);

        //流程是否发送通知
        $flowIsSendMessage = $stepRun->flow->send_message;

        //发送通知
        if (config('oa.is_send_message') && $flowIsSendMessage) {
            //流程允许发送通知

            //发送通知给审批人
            if($stepRun->steps->send_todo){
                //允许发送待办通知
                $this->dingTalkMessage->sendTodoMessage($stepRun, $formData);
                //发送工作通知OA消息
                $this->dingTalkMessage->sendJobOaMessage($stepRun, $formData);
            }

            //发送工作通知text消息 给发起人
            if($stepRun->steps->send_start){
                $content = '你发起的'.$stepRun->flow_name.'流程被'.$approverName.'转交给'.$stepRun->approver_name.'审批了';
                $this->dingTalkMessage->sendJobTextMessage($stepRun,$content);
            }

        }
    }
}