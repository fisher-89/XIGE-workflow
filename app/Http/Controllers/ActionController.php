<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliverRequest;
use App\Http\Requests\PresetRequest;
use App\Http\Requests\RejectRequest;
use App\Http\Requests\StartRequest;
use App\Http\Requests\ThroughRequest;
use App\Http\Requests\WithdrawRequest;
use App\Models\Flow;
use App\Services\CallbackService;
use App\Services\DeliverService;
use App\Services\RejectService;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * 流程预提交处理
     * @param Request $request
     */
    public function preset(PresetRequest $request, Flow $flow)
    {
        $responseData = app('action')->preset($request, $flow);
        return app('apiResponse')->post($responseData);
    }

    /**
     * 流程发起处理
     * @param StartRequest $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function start(StartRequest $request, Flow $flow, CallbackService $callbackService)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'))['form_data'];
        $flowRunData = app('action')->start($request, $flow);
        $callbackService->startCallback($flowRunData,$cacheFormData);//触发开始回调
        return app('apiResponse')->post($flowRunData);
    }

    /**
     * 撤回
     * @param WithdrawRequest $request
     * @return mixed
     */
    public function withdraw(WithdrawRequest $request)
    {
        $flowRunData =  app('withdraw')->withdraw($request);
        return app('apiResponse')->patch($flowRunData);

    }

    /**
     * 通过处理
     * @param Request $request
     */
    public function through(ThroughRequest $request, CallbackService $callbackService)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'))['form_data'];
        $stepRunData = app('through', ['stepRunId' => $request->input('step_run_id')])->through($request);
        $callbackService->approveCallback($stepRunData,$cacheFormData);//触发通过回调
        return app('apiResponse')->patch($stepRunData);
    }

    /**
     * 驳回
     * @param RejectRequest $request
     */
    public function reject(RejectRequest $request, RejectService $rejectService, CallbackService $callbackService)
    {
        $stepRunData = $rejectService->reject($request);
        $callbackService->rejectCallback($stepRunData);
        return app('apiResponse')->patch($stepRunData);
    }

    /**
     * 转交
     * @param DeliverRequest $request
     * @param DeliverService $deliverService
     * @return mixed
     */
    public function deliver(DeliverRequest $request, DeliverService $deliverService,CallbackService $callbackService)
    {
        $stepRunData = $deliverService->deliver($request);
        $callbackService->transferCallback($stepRunData);//触发转交回调
        return app('apiResponse')->post($stepRunData);
    }
}
