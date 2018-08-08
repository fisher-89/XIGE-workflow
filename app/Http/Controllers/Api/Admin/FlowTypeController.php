<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FlowTypeRequest;
use App\Models\FlowType;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class FlowTypeController extends Controller
{
    protected $response;

    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 流程分类新增保存
     * @param FlowTypeRequest $request
     */
    public function store(FlowTypeRequest $request)
    {
        $data = FlowType::create($request->input());
        return $this->response->post($data);
    }

    /**
     * 流程分类编辑保存
     * @param FlowTypeRequest $request
     */
    public function update(FlowTypeRequest $request, FlowType $flowType)
    {
        $flowType->update($request->input());
        return $this->response->put($flowType);
    }

    /**
     * 删除
     * @param Request $request
     */
    public function destroy(FlowType $flowType)
    {
        if (count($flowType->flow) > 0)
            abort(400, '该分类已经有流程在使用了,不能进行删除');
        $flowType->delete();
        return $this->response->delete();
    }


    /**
     * 流程分类列表
     * @param Request $request
     */
    public function index()
    {
        $response = Cache::rememberForever('flow_types',function(){
            return FlowType::orderBy('sort','desc')->get()->toArray();
        });
        return $this->response->get($response);
    }

    /**
     * 流程分类编辑
     * @param Request $reqeust
     */
    public function show(FlowType $flowType)
    {
        return $this->response->get($flowType);
    }

}
