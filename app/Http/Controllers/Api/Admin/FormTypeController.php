<?php

namespace App\Http\Controllers\Api\Admin;


use App\Http\Requests\Admin\FormTypeRequest;
use App\Models\FormType;

use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class FormTypeController extends Controller
{
    protected $response;


    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 表单分类新增保存
     * @param FormTypeRequest $request
     */
    public function store(FormTypeRequest $request)
    {
        $data = FormType::create($request->input());
        return $this->response->post($data);
    }

    /**
     * 表单分类编辑保存
     * @param FormTypeRequest $request
     */
    public function update(FormTypeRequest $request, $id)
    {
        $formType = FormType::findOrFail($id);
        $formType->update($request->input());
        return $this->response->put($formType);
    }

    /**
     * 删除
     * @param Request $request
     */
    public function destroy($id)
    {
        $formType = FormType::findOrFail($id);
        if($formType->form->count() > 0)
            abort(400, '该分类已经有表单在使用了,不能进行删除');
        $formType->delete();
        return $this->response->delete();
    }


    /**
     * 表单分类列表
     * @param Request $request
     */
    public function index()
    {
        $response = Cache::rememberForever('form_types',function(){
           return FormType::orderBy('sort','asc')->get()->toArray();
        });
        return $this->response->get($response);
    }

    /**
     * 流程分类编辑获取
     * @param Request $reqeust
     */
    public function show($id)
    {
        $data = FormType::findOrFail($id);
        return $this->response->get($data);
    }
}
