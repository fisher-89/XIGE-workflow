<?php
/**
 * 转交
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14/014
 * Time: 11:47
 */

namespace App\Services\Web;


use App\Models\StepRun;
use App\Repository\Web\FormRepository;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class DeliverService
{
    protected $formRepository;
    protected $dingTalkMessage;
    //发起回调
    protected $sendCallback;

    public function __construct(FormRepository $formRepository, MessageNotification $messageNotification)
    {
        $this->formRepository = $formRepository;
        $this->dingTalkMessage = $messageNotification;
        $this->sendCallback = new SendCallbackService();
    }

    /**
     * 转交处理
     * @param $request
     */
    public function deliver($request)
    {
        $stepRun = StepRun::findOrFail($request->input('step_run_id'));
        DB::transaction(function () use ($request, $stepRun, &$deliverData) {
            $stepRun->action_type = 3;
            $stepRun->acted_at = date('Y-m-d H:i:s');
            $stepRun->remark = trim($request->input('remark'));
            $stepRun->save();
            $stepRunData = array_except($stepRun->toArray(), ['id', 'approver_sn', 'approver_name', 'acted_at', 'created_at', 'updated_at', 'deleted_at']);
            $data = $stepRunData;
            $data['action_type'] = 0;
            $data['prev_id'] = [$stepRun->id];
            $data['next_id'] = [];
            $data = array_collapse([$data, $request->only(['approver_sn', 'approver_name'])]);
            $deliverData = StepRun::create($data);

            $stepRun->next_id = [$deliverData->id];
            $stepRun->save();

            //触发转交回调
            $this->sendCallback->sendCallback($deliverData->id, 'step_deliver');

            try {
                //更新待办
                $dingTalkMessage = new MessageNotification();
                $updateTodoResult = $dingTalkMessage->updateTodo($stepRun->id);
                abort_if($updateTodoResult == 0, 400, '发送更新待办通知失败');

                //发送钉钉消息（发送给下一步审批人）

                $this->sendMessage($deliverData, $stepRun->approver_name);
            } catch (\Exception $e) {

            }

        });
        return $deliverData;
    }

    /**
     * 发送消息
     * @param $stepRun
     */
    protected function sendMessage($stepRun, string $approverName)
    {
        //表单Data
        $formData = $this->formRepository->getFormData($stepRun->flow_run_id);

        //流程是否发送通知
        $flowIsSendMessage = $stepRun->flow->send_message;

        //发送通知
        if (config('oa.is_send_message') && $flowIsSendMessage) {
            //流程允许发送通知

            //发送通知给审批人
            if ($stepRun->steps->send_todo) {
                //允许发送待办通知
                $todoResult = $this->dingTalkMessage->sendTodoMessage($stepRun, $formData);
                abort_if($todoResult == 0, 400, '发送待办通知失败');
                //发送工作通知OA消息
                $oaMsgResult = $this->dingTalkMessage->sendJobOaMessage($stepRun, $formData);
                abort_if($oaMsgResult == 0, 400, '发送工作通知失败');
            }

            //发送工作通知text消息 给发起人
            if ($stepRun->steps->send_start) {
                $content = '你发起的' . $stepRun->flow_name . '流程'.$stepRun->created_at->format('Y-m-d H:i:s').'被' . $approverName . '转交给' . $stepRun->approver_name . '审批了';
                $result = $this->dingTalkMessage->sendJobTextMessage($stepRun, $content);
                abort_if($result == 0, 400, '发送工作通知失败');
            }

        }
    }
}