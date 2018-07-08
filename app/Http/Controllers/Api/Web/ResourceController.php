<?php

namespace App\Http\Controllers\Api\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\StartRequest;
use App\Http\Resources\StepResource;
use App\Models\Flow;
use App\Models\StepRun;
use App\Repository\FlowRunRepository;
use App\Repository\StepRunRepository;
use App\Repository\Web\Auth\FlowAuth;
use App\Services\CallbackService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    protected $response;

    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 获取可发起的流程
     * @return string
     */
    public function getFlowList()
    {
        $flowId = FlowAuth::getCurrentUserFlowAuthorize();//获取当前用户有权限的流程
        $flow = Flow::whereIsActive(1)->select('id', 'name', 'description')->orderBy('sort', 'asc')->find($flowId);
        return $this->response->get($flow);
    }

    /**
     * 获取发起数据
     * @param StartRequest $request
     * @return array
     */
    public function start(Flow $flow)
    {
        $flowAuthorized = (bool)FlowAuth::checkFlowAuthorize($flow->id);//该流程的当前用户权限
        if ($flowAuthorized === false)
            abort(403, '该流程你无权限');
        if ($flow->is_active === 0)
            abort(404, '该流程未启动');
        $flowRepository = new \App\Repository\FlowRepository();
        $firstStepData = $flowRepository->getFlowFirstStep($flow);//开始步骤数据

        $formRepository = new \App\Repository\FormRepository();
        //表单字段  去除了hidden字段
        $fields = $formRepository->getFields($flow->form_id);//全部字段
//        $fields = $formRepository->getExceptHiddenFields($firstStepData->hidden_fields, $flow->form_id);

        $formData = $formRepository->getFormData();//获取表单data数据
        $filterFormData = app('formData')->getFilterFormData($formData, $fields);//获取筛选过后的表单数据

        $data = [
            'step' => new StepResource($firstStepData),
            'form_data' => $filterFormData,
            'fields' => $fields,
        ];
        return $this->response->get($data);
    }

    /**
     * 获取审批列表
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getApproval(Request $request)
    {
        $stepRunRepository = new StepRunRepository();
        $data = $stepRunRepository->getApproval($request);
        return $this->response->get($data);
    }

    /**
     * 获取审批详情
     * @param Flow $flow
     * @param StepRun $stepRun
     * @return array
     */
    public function getApprovalDetail(StepRun $stepRun, CallbackService $callbackService)
    {
        $stepRunRepository = new \App\Repository\StepRunRepository();
        $data = $stepRunRepository->getDetail($stepRun);
        $callbackService->checkCallback($data);//触发查看回调
        return $this->response->get($data);
    }

    /**
     * 获取发起列表
     * @param Request $request
     */
    public function getSponsor(Request $request)
    {
        $flowRunRepository = new FlowRunRepository();
        $data = $flowRunRepository->getSponsor($request);
        return $this->response->get($data);
    }

    /**
     * 获取发起详情
     * @param $flowRunId
     */
    public function getSponsorDetail($flowRunId)
    {
        $stepRun = StepRun::where(['flow_run_id' => $flowRunId, 'approver_sn' => app('auth')->id(), 'action_type' => 1])->first();
        $stepRunRepository = new \App\Repository\StepRunRepository();
        $data = $stepRunRepository->getDetail($stepRun);
        return $this->response->get($data);
    }
}
