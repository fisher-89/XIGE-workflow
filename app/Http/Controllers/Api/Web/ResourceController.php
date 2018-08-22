<?php

namespace App\Http\Controllers\Api\Web;


use App\Http\Controllers\Controller;
use App\Http\Resources\StepResource;
use App\Jobs\SendCallback;
use App\Models\Flow;
use App\Models\FlowType;
use App\Models\StepRun;
use App\Repository\Web\FlowRunRepository;
use App\Repository\Web\FormRepository;
use App\Repository\Web\StepRunRepository;
use App\Repository\Web\Auth\FlowAuth;
use App\Repository\Web\FlowRepository;
use App\Services\OA\OaApiService;
use App\Services\Web\CallbackService;
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
        $flow = FlowType::with(['flow' => function ($query) use ($flowId) {
            $query->whereIn('id', $flowId)
                ->where('is_active', 1)
                ->select('id', 'name', 'description', 'flow_type_id')
                ->orderBy('sort', 'asc');
        }])
            ->select('id', 'name')
            ->orderBy('sort', 'asc')
            ->get();

        //过滤分类下无流程的
        $data = $flow->filter(function ($value, $key) {
            return count($value->flow) > 0;
        })->pluck([]);
//        $flow = Flow::whereIsActive(1)->select('id', 'name', 'description')->orderBy('sort', 'asc')->find($flowId);
        return $this->response->get($data);
    }

    /**
     * 获取发起数据
     * @return array
     */
    public function start(Flow $flow)
    {
        $flowAuthorized = (bool)FlowAuth::checkFlowAuthorize($flow->id);//该流程的当前用户权限
        if ($flowAuthorized === false)
            abort(403, '该流程你无权限');
        if ($flow->is_active === 0)
            abort(404, '该流程未启动');
        $flowRepository = new FlowRepository();
        $firstStepData = $flowRepository->getFlowFirstStep($flow);//开始步骤数据

        $formRepository = new FormRepository();
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
    public function getApprovalDetail(StepRun $stepRun)
    {
        $stepRunRepository = new StepRunRepository();
        $data = $stepRunRepository->getDetail($stepRun);
        //步骤查看回调
        SendCallback::dispatch($data['step_run']->id, 'step_check');
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
        $stepRunRepository = new StepRunRepository();
        $data = $stepRunRepository->getDetail($stepRun);
        return $this->response->get($data);
    }
}
