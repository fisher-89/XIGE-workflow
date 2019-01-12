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

    /**
     * 获取导出流程列表
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getFlowList()
    {
        $data = $this->flowRun->getFlowList();
        return $this->response->get($data);
    }
    /**
     * 获取导出表单列表
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getFormList()
    {
        $data = $this->flowRun->getFormList();
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
     * 通过流程number获取表单数据（包含旧的）
     * @param $number
     */
    public function getFlowForm($number)
    {
        $data = $this->flowRun->getFlowForm($number);
        return $this->response->get($data);
    }

    /**
     * 通过表单number获取表单数据（包含旧的）
     * @param $number
     */
    public function getForm($number)
    {
        $data = $this->flowRun->getForm($number);
        return $this->response->get($data);
    }
}
