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
}
