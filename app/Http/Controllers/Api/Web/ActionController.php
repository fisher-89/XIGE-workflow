<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\DeliverRequest;
use App\Http\Requests\Web\PresetRequest;
use App\Http\Requests\Web\RejectRequest;
use App\Http\Requests\Web\StartRequest;
use App\Http\Requests\Web\ThroughRequest;
use App\Http\Requests\Web\WithdrawRequest;
use App\Services\Web\DeliverService;
use App\Services\Web\PresetService;
use App\Services\Web\RejectService;
use App\Services\ResponseService;
use App\Services\Web\StartService;
use App\Services\Web\ThroughService;
use App\Services\Web\WithdrawService;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    protected $response;//返回
    //预提交
    protected $presetService;
    //发起
    protected $startService;

    public function __construct(ResponseService $responseService, PresetService $presetService, StartService $startService)
    {
        $this->response = $responseService;
        $this->presetService = $presetService;
        $this->startService = $startService;
    }

    /**
     * 流程预提交处理
     * @param Request $request
     */
    public function preset(PresetRequest $request)
    {
        $data = $this->presetService->makePreset($request);
        return $this->response->post($data);
    }

    /**
     * 流程发起处理
     * @param StartRequest $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function start(StartRequest $request)
    {
        $data = $this->startService->makeStart($request);
        return $this->response->post($data);
    }

    /**
     * 撤回
     * @param WithdrawRequest $request
     * @return mixed
     */
    public function withdraw(WithdrawRequest $request, WithdrawService $withdrawService)
    {
        $flowRunData = $withdrawService->withdraw($request);
        return $this->response->patch($flowRunData);

    }

    /**
     * 通过处理
     * @param Request $request
     */
    public function through(ThroughRequest $request, ThroughService $throughService)
    {
        $stepRunData = $throughService->through($request);
        return $this->response->patch($stepRunData);
    }

    /**
     * 驳回
     * @param RejectRequest $request
     */
    public function reject(RejectRequest $request, RejectService $rejectService)
    {
        $stepRunData = $rejectService->reject($request);
        return $this->response->patch($stepRunData);
    }

    /**
     * 转交
     * @param DeliverRequest $request
     * @param DeliverService $deliverService
     * @return mixed
     */
    public function deliver(DeliverRequest $request, DeliverService $deliverService)
    {
        $stepRunData = $deliverService->deliver($request);
        return $this->response->post($stepRunData);
    }
}
