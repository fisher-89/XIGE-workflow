<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\DeliverRequest;
use App\Http\Requests\Web\PresetRequest;
use App\Http\Requests\Web\RejectRequest;
use App\Http\Requests\Web\StartRequest;
use App\Http\Requests\Web\ThroughRequest;
use App\Http\Requests\Web\WithdrawRequest;
use App\Models\Flow;
use App\Services\Web\CallbackService;
use App\Services\Web\DeliverService;
use App\Services\Web\RejectService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    protected $response;//返回
    protected $callback;//回调

    public function __construct(ResponseService $responseService, CallbackService $callbackService)
    {
        $this->response = $responseService;
        $this->callback = $callbackService;
    }

    /**
     * 流程预提交处理
     * @param Request $request
     */
    public function preset(PresetRequest $request, Flow $flow)
    {
        $responseData = app('action')->preset($request, $flow);
        return $this->response->post($responseData);
    }

    /**
     * 流程发起处理
     * @param StartRequest $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function start(StartRequest $request, Flow $flow)
    {
//        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'))['form_data'];
        $stepRunData = app('action')->start($request, $flow);
//        $this->callback->startCallback($stepRunData, $cacheFormData);//触发开始回调
        return $this->response->post($stepRunData);
    }

    /**
     * 撤回
     * @param WithdrawRequest $request
     * @return mixed
     */
    public function withdraw(WithdrawRequest $request)
    {
        $flowRunData = app('withdraw')->withdraw($request);
        return $this->response->patch($flowRunData);

    }

    /**
     * 通过处理
     * @param Request $request
     */
    public function through(ThroughRequest $request)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'))['form_data'];
        $stepRunData = app('through', ['stepRunId' => $request->input('step_run_id')])->through($request);
        $this->callback->approveCallback($stepRunData, $cacheFormData);//触发通过回调
        if($stepRunData->flowRun->status = 1){
            //结束流程
            $this->callback->endFlow($stepRunData,$cacheFormData);//触发结束流程回调
        }
        return $this->response->patch($stepRunData);
    }

    /**
     * 驳回
     * @param RejectRequest $request
     */
    public function reject(RejectRequest $request, RejectService $rejectService)
    {
        $stepRunData = $rejectService->reject($request);
        $this->callback->rejectCallback($stepRunData);
        return $this->response->patch($stepRunData);
    }

    /**
     * 转交
     * @param DeliverRequest $request
     * @param DeliverService $deliverService
     * @return mixed
     */
    public function deliver(DeliverRequest $request, DeliverService $deliverService, CallbackService $callbackService)
    {
        $stepRunData = $deliverService->deliver($request);
        $callbackService->transferCallback($stepRunData);//触发转交回调
        return $this->response->post($stepRunData);
    }
}
