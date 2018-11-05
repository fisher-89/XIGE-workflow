<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\Form\FormValidator;
use App\Models\Form;
use App\Services\Admin\Form\FormService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    //返回
    protected $response;
    //表单处理服务
    protected $formService;
    //表单验证
    protected $formValidator;

    public function __construct(ResponseService $responseService, FormService $formService, FormValidator $formValidator)
    {
        $this->response = $responseService;
        $this->formService = $formService;
        $this->formValidator = $formValidator;
    }

    /**
     * 新增
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
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
    public function update(Request $request)
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
        $data = Form::orderBy('sort', 'asc')->get();
        return $this->response->get($data);
    }


    /**
     * 删除
     * @param Request $request
     */
    public function destroy($id)
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
    public function show($id)
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
}
