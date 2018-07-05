<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FlowTypeRequest;
use App\Models\FlowType;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlowTypeController extends Controller
{

    /**
     * 流程分类新增保存
     * @param FlowTypeRequest $request
     */
    public function store(FlowTypeRequest $request)
    {
        $data = FlowType::create($request->input());
        return app('apiResponse')->post($data);
    }

    /**
     * 流程分类编辑保存
     * @param FlowTypeRequest $request
     */
    public function update(FlowTypeRequest $request,FlowType $flowType)
    {
        $flowType->update($request->input());
        return app('apiResponse')->put($flowType);
    }

    /**
     * 删除
     * @param Request $request
     */
    public function destroy(FlowType $flowType)
    {
        if (count($flowType->flow) > 0)
            abort(403,'该分类已经有流程在使用了,不能进行删除');
        $flowType->delete();
        return app('apiResponse')->delete();
    }


    /**
     * 流程分类列表
     * @param Request $request
     */
    public function index(ResponseService $responseService)
    {
        $response = cache()->get('flow_types',function(){
           $data = FlowType::orderBy('sort','asc')->get()->toArray();
           cache()->forever('flow_types',$data);
           return $data;
        });
        return $responseService->get($response);
    }

    /**
     * 流程分类编辑
     * @param Request $reqeust
     */
    public function show(FlowType $flowType)
    {
        return app('apiResponse')->get($flowType);
    }

}
