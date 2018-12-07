<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\Flow\FlowRequest;
use App\Http\Requests\Admin\Flow\FlowShowAndDestroyRequest;
use App\Models\Flow;
use App\Services\Admin\Auth\RoleService;
use App\Services\Admin\Flow\FlowIcon;
use App\Services\Admin\Flow\FlowService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FlowController extends Controller
{
    protected $flowService;
    protected $response;
    protected $role;
    public function __construct(FlowService $flowService, ResponseService $responseService,RoleService $roleService)
    {
        $this->flowService = $flowService;
        $this->response = $responseService;
        $this->role = $roleService;
    }

    /**
     * 新增
     * @param FlowRequest $request
     * @return mixed
     */
    public function store(FlowRequest $request)
    {
        $data = $this->flowService->store($request);
        return $this->response->post($data);
    }

    /**
     * 编辑
     * @param FlowRequest $request
     * @return mixed
     */
    public function update(FlowRequest $request)
    {
        $data = $this->flowService->update($request);
        return $this->response->put($data);
    }

    /**
     * 列表
     * @param Request $request
     */
    public function index()
    {
        $query = Flow::with('steps');
        //超级管理员
        $super = $this->role->getSuperStaff();
        $flowNumber = $this->role->getFlowNumber();

        if(empty($super) || ($super && (!in_array(Auth::id(),$super)))){
            //没有超级管理员 或 有超级管理员 并且不在超级管理员中
            $query = $query->whereIn('number',$flowNumber);
        }
        $data = $query->orderBy('sort', 'asc')->get();
        return $this->response->get($data);
    }

    /**
     * 删除
     * @param Request $request
     */
    public function destroy(FlowShowAndDestroyRequest $request, $id)
    {
        $flow = Flow::findOrFail($id);
        if ($flow->is_active == 1)
            abort(403, '该流程已启用无法进行删除');
        $flow->delete();
        return $this->response->delete();
    }


    /**
     * 详情
     * @param Request $request
     */
    public function show(FlowShowAndDestroyRequest $request,$id)
    {
        $flow = Flow::withTrashed()->detail()->findOrFail($id);
        return $this->response->get($flow);
    }

    /**
     * 克隆流程
     * @param Request $request
     */
    public function flowClone(Request $request)
    {
        $this->validate($request, [
            'flow_id' => [
                Rule::exists('flows', 'id')
            ]
        ], [], ['flow_id' => "流程ID"]);
        $data = $this->flowService->flowClone();
        return $this->response->post($data);
    }

    /**
     * 获取旧流程列表
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getOldFlow($id)
    {
        $flow = Flow::findOrFail($id);
        $oldFlow = Flow::onlyTrashed()->where('number', $flow->number)->orderBy('created_at','desc')->get();
        return $this->response->get($oldFlow);
    }

    /**
     * 上传图标
     * @param Request $request
     * @param FlowIcon $flowIcon
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function uploadIcon(Request $request,FlowIcon $flowIcon)
    {
        $this->validate($request,[
            'icon'=>[
                'file',
                'image'// jpeg、png、bmp、gif、或 svg
            ]
        ],[],[
            'icon'=>'图标'
        ]);
        $data = $flowIcon->upload();
        return $this->response->post($data);
    }
}
