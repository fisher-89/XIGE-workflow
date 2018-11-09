<?php

namespace App\Http\Controllers\Api\Admin;

use App\Repository\Admin\FlowRun\FlowRunRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlowRunController extends Controller
{
    protected $response;
    protected $flowStepRun;

    public function __construct(ResponseService $responseService, FlowRunRepository $flowStepRunRepository)
    {
        $this->response = $responseService;
        $this->flowStepRun = $flowStepRunRepository;
    }

    /**
     * 获取列表
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $data = $this->flowStepRun->getIndex();
        return $this->response->get($data);
    }

    /**
     * 获取导出数据
     */
    public function getExport()
    {
        $data = $this->flowStepRun->getExportData();
        return $this->response->get($data);
    }

    /**
     * 通过流程ID获取表单数据（包含旧的）
     * @param $flowId
     */
    public function getFlowForm($flowId)
    {
        $data = $this->flowStepRun->getFlowForm($flowId);
        return $this->response->get($data);
    }

    /**
     * 通过表单ID获取表单数据（包含旧的）
     * @param $formId
     */
    public function getForm($formId){
        $data = $this->flowStepRun->getForm($formId);
        return $this->response->get($data);
    }
}
