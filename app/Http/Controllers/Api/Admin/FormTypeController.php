<?php

namespace App\Http\Controllers\Api\Admin;


use App\Http\Requests\Admin\FormTypeReqeust;
use App\Models\FormType;

use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormTypeController extends Controller
{
    protected $response;


    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 表单分类新增保存
     * @param FormTypeReqeust $request
     */
    public function store(FormTypeReqeust $request)
    {
        $data = FormType::create($request->input());
        return $this->response->post($data);
    }

    /**
     * 流程分类编辑保存
     * @param FormTypeReqeust $request
     */
    public function update(FormTypeReqeust $request, FormType $formType)
    {
        $formType->update($request->input());
        return $this->response->put($formType);
    }

    /**
     * 删除
     * @param Request $request
     */
    public function destroy(FormType $formType)
    {
        if (count($formType->form) > 0)
            abort(403, '该分类已经有表单在使用了,不能进行删除');
        $formType->delete();
        return $this->response->delete();
    }


    /**
     * 表单分类列表
     * @param Request $request
     */
    public function index()
    {
        $response = cache()->get('form_types', function () {
            $data = FormType::orderBy('sort', 'asc')->get()->toArray();
            cache()->forever('form_types', $data);
            return $data;
        });
        return $this->response->get($response);
    }

    /**
     * 流程分类编辑获取
     * @param Request $reqeust
     */
    public function show(FormType $formType)
    {
        return $this->response->get($formType);
    }
}
