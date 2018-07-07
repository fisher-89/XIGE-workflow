<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FlowRequest;
use App\Models\Flow;
use App\Services\Admin\FlowService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlowController extends Controller
{
    protected $flowService;
    protected $response;

    public function __construct(FlowService $flowService, ResponseService $responseService)
    {
        $this->flowService = $flowService;
        $this->response = $responseService;
    }

    /**
     * 流程新增保存
     * @param FlowRequest $request
     * @return mixed
     */
    public function store(FlowRequest $request)
    {
        $data = $this->flowService->store($request);
        return $this->response->post($data);
    }

    /**
     * 流程编辑保存
     * @param FlowRequest $request
     * @return mixed
     */
    public function update(FlowRequest $request)
    {
        $data = $this->flowService->update($request);
        return $this->response->put($data);
    }

    /**
     * 流程获取列表
     * @param Request $request
     */
    public function index()
    {
        $data = Flow::with('steps')->orderBy('sort', 'asc')->get();
        return $this->response->get($data);
    }

    /**
     * 流程删除
     * @param Request $request
     */
    public function destroy($id)
    {
        $flow = Flow::find($id);
        if (empty($flow))
            abort(404, '该流程不存在');
        if ($flow->is_active == 1)
            abort(403, '该流程已启用无法进行删除');
        $flow->delete();
        return $this->response->delete();
    }


    /**
     * 流程获取编辑数据
     * @param Request $request
     */
    public function show($id)
    {
        $flow = Flow::detail()->find($id);
        if (empty($flow))
            abort(404, '该流程不存在');
        return $this->response->get($flow);
    }
}
