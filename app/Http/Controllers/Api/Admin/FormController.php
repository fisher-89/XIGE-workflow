<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FormsRequest;
use App\Models\Flow;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * 表单新增保存
     * @param FormsRequest $request
     * @return mixed
     */
    public function store(FormsRequest $request)
    {
        $data = app('formService')->create($request);
        return app('apiResponse')->post($data);
    }

    /**
     * 表单编辑保存
     * @param FormsRequest $request
     * @return mixed
     */
    public function update(FormsRequest $request)
    {
        $data = app('formService')->update($request);
        return app('apiResponse')->put($data);
    }

    /**
     *  表单列表
     * @param Request $request
     */
    public function index()
    {
        $data = Form::orderBy('sort', 'asc')->get();
        return app('apiResponse')->get($data);
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
            abort(403, '改表单已被流程使用了');
        $data->delete();
        return app('apiResponse')->delete();
    }

    /**
     * 表单修改获取数据
     * @param Request $request
     */
    public function show($id)
    {
        $data = Form::with(['fields.validator', 'grids.fields.validator'])->find($id);
        if (empty($data))
            abort(404,'该表单不存在');
        return app('apiResponse')->get($data);
    }
}
