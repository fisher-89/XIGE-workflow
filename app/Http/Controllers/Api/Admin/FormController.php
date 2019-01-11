<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\Form\FormAuthRequest;
use App\Http\Requests\Admin\Form\FormValidator;
use App\Models\Form;
use App\Services\Admin\Auth\RoleService;
use App\Services\Admin\Form\FormService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    //返回
    protected $response;
    //表单处理服务
    protected $formService;
    //表单验证
    protected $formValidator;
    //角色权限
    protected $role;

    public function __construct(ResponseService $responseService, FormService $formService, FormValidator $formValidator, RoleService $roleService)
    {
        $this->response = $responseService;
        $this->formService = $formService;
        $this->formValidator = $formValidator;
        $this->role = $roleService;
    }

    /**
     * 新增
     * @param Request $request
     * @return mixed
     */
    public function store(FormAuthRequest $request)
    {
        //表单验证
        $rules = $this->formValidator->rules($request);
        $message = $this->formValidator->message();
        $this->validate($request, $rules, [], $message);
        $data = $this->formService->store($request);
        return $this->response->post($data);
    }

    /**
     * 编辑
     * @param Request $request
     * @return mixed
     */
    public function update(FormAuthRequest $request)
    {
        //表单验证
        $rules = $this->formValidator->rules($request);
        $message = $this->formValidator->message();
        $this->validate($request, $rules, [], $message);
        $data = $this->formService->update($request);
        return $this->response->put($data);
    }

    /**
     *  列表
     * @param Request $request
     */
    public function index()
    {
        //超级管理员
        $super = $this->role->getSuperStaff();
        $formNumber = $this->role->getHandleFormNumber();

        if (empty($super) || ($super && (!in_array(Auth::id(), $super)))) {
            //没有超级管理员 或 有超级管理员 并且不在超级管理员中
            $data = Form::whereIn('number', $formNumber)->orderBy('sort', 'asc')->get();
        } else {
            $data = Form::orderBy('sort', 'asc')->get();
        }

        return $this->response->get($data);
    }


    /**
     * 删除
     * @param Request $request
     */
    public function destroy(FormAuthRequest $request, $id)
    {
        $data = Form::withCount('flows')->findOrFail($id);
        if ($data->flows_count > 0)
            abort(403, '该表单已被 ' . $data->flows_count . ' 流程使用了');
        $data->delete();
        return $this->response->delete();
    }

    /**
     * 详情
     * @param Request $request
     */
    public function show(FormAuthRequest $request, $id)
    {
        $data = Form::withTrashed()->with([
            'fields' => function ($query) {
                $query->whereNull('form_grid_id')->orderBy('sort', 'asc');
            },
            'fields.validator',
            'grids.fields.validator'
        ])->findOrFail($id);
        return $this->response->get($data);
    }

    /**
     * 获取旧表单列表
     * @param $id
     */
    public function getOldForm($id)
    {
        $form = Form::findOrFail($id);
        $oldForm = Form::onlyTrashed()
            ->where('number', $form->number)
            ->orderBy('created_at', 'desc')
            ->get();
        return $this->response->get($oldForm);
    }

    /**
     * 获取表单列表（不带权限）
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getFormList()
    {
        $data = Form::filterByQueryString()
            ->sortByQueryString()
            ->select('id', 'name', 'sort', 'number')
            ->withPagination();
        return $this->response->get($data);
    }
}
