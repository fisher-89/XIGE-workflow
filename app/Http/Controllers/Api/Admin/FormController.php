<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FormsRequest;
use App\Models\Flow;
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

    public function __construct(ResponseService $responseService,FormService $formService)
    {
        $this->response = $responseService;
        $this->formService = $formService;
    }

    /**
     * 表单新增保存
     * @param FormsRequest $request
     * @return mixed
     */
    public function store(FormsRequest $request)
    {
        $data = $this->formService->store($request);
        return $this->response->post($data);
    }

    /**
     * 表单编辑保存
     * @param FormsRequest $request
     * @return mixed
     */
    public function update(FormsRequest $request)
    {
        $data = $this->formService->update($request);
        return $this->response->put($data);
    }

    /**
     *  表单列表
     * @param Request $request
     */
    public function index()
    {
        $data = Form::orderBy('sort', 'asc')->get();
        return $this->response->get($data);
    }


    /**
     * 表单删除
     * @param Request $request
     */
    public function destroy($id)
    {
        $data = Form::find($id);
        if (empty($data))
            abort(404, '该表单不存在');
        $flowData = Flow::where('form_id', $id)->count();
        if ($flowData > 0)
            abort(403, '该表单已被流程使用了');
        $data->delete();
        return $this->response->delete();
    }

    /**
     * 表单修改获取数据
     * @param Request $request
     */
    public function show($id)
    {
        $data = Form::with([
            'fields' => function ($query) {
                $query->whereNull('form_grid_id')->orderBy('sort', 'asc');
            },
            'fields.validator',
            'grids.fields.validator'
        ])->find($id);
        if (empty($data))
            abort(404, '该表单不存在');
        return $this->response->get($data);
    }
}
