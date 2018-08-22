<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\DeliverRequest;
use App\Http\Requests\Web\PresetRequest;
use App\Http\Requests\Web\RejectRequest;
use App\Http\Requests\Web\StartRequest;
use App\Http\Requests\Web\ThroughRequest;
use App\Http\Requests\Web\WithdrawRequest;
use App\Jobs\SendCallback;
use App\Models\Flow;
use App\Services\Web\DeliverService;
use App\Services\Web\RejectService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    protected $response;//返回

    public function __construct(ResponseService $responseService )
    {
        $this->response = $responseService;
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
        $stepRunData = app('action')->start($request, $flow);
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
        $stepRunData = app('through', ['stepRunId' => $request->input('step_run_id')])->through($request);
        return $this->response->patch($stepRunData);
    }

    /**
     * 驳回
     * @param RejectRequest $request
     */
    public function reject(RejectRequest $request, RejectService $rejectService)
    {
        $stepRunData = $rejectService->reject($request);
        //步骤驳回回调
        SendCallback::dispatch($stepRunData->id, 'step_reject');
        return $this->response->patch($stepRunData);
    }

    /**
     * 转交
     * @param DeliverRequest $request
     * @param DeliverService $deliverService
     * @return mixed
     */
    public function deliver(DeliverRequest $request, DeliverService $deliverService )
    {
        $stepRunData = $deliverService->deliver($request);
        //触发转交回调
        SendCallback::dispatch($stepRunData->id,'step_deliver');
        return $this->response->post($stepRunData);
    }
}
