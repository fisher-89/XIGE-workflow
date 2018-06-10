<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresetRequest;
use App\Http\Requests\RejectRequest;
use App\Http\Requests\StartRequest;
use App\Http\Requests\ThroughRequest;
use App\Http\Requests\WithdrawRequest;
use App\Models\Flow;
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
    public function start(StartRequest $request, Flow $flow)
    {
        $flowRunData = app('action')->start($request, $flow);
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
    public function through(ThroughRequest $request)
    {
        $stepRunData = app('through', ['stepRunId' => $request->input('step_run_id')])->through($request);
        return app('apiResponse')->patch($stepRunData);
    }

    /**
     * 驳回
     * @param RejectRequest $request
     */
    public function reject(RejectRequest $request, RejectService $rejectService)
    {
        $stepRunData = $rejectService->reject($request);
        return app('apiResponse')->patch($stepRunData);
    }
}
