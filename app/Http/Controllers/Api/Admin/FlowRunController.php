<?php

namespace App\Http\Controllers\Api\Admin;

use App\Repository\Admin\FlowRun\FlowRunRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class FlowRunController extends Controller
{
    protected $response;
    protected $flowRun;

    public function __construct(ResponseService $responseService, FlowRunRepository $flowRunRepository)
    {
        $this->response = $responseService;
        $this->flowRun = $flowRunRepository;
    }

    /**
     * 获取列表
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $data = $this->flowRun->getIndex();
        return $this->response->get($data);
    }


    /*------------------导出start------------------*/

    /**
     * 开始导出
     */
    public function startExport()
    {
        $code = $this->flowRun->startExport();
        return $this->response->get($code);
    }
    /**
     * 获取导出进度
     */
    public function getExport()
    {
        $code = $this->flowRun->getExport();
        return $this->response->get($code);
    }

    /**
     * 下载导出
     */
    public function downloadExport(Request $request)
    {
        $path = $request->query('path');
        return response()->download(storage_path('app/public/'.$path));
    }
    /*------------------导出end------------------*/
    /**
     * 通过流程ID获取表单数据（包含旧的）
     * @param $flowId
     */
    public function getFlowForm($flowId)
    {
        $data = $this->flowRun->getFlowForm($flowId);
        return $this->response->get($data);
    }

    /**
     * 通过表单ID获取表单数据（包含旧的）
     * @param $formId
     */
    public function getForm($formId)
    {
        $data = $this->flowRun->getForm($formId);
        return $this->response->get($data);
    }
}
