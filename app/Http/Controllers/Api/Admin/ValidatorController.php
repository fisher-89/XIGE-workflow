<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\ValidatorRequest;
use App\Http\Resources\Admin\Validator\ValidatorCollection;
use App\Http\Resources\Admin\Validator\ValidatorResource;
use App\Models\Validator;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidatorController extends Controller
{
    protected $response;

    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * 新增
     * @param ValidatorRequest $request
     */
    public function store(ValidatorRequest $request)
    {
        $data = Validator::create($request->input());
        $data = new ValidatorResource($data);
        return $this->response->post($data);
    }

    /**
     * 编辑
     * @param ValidatorRequest $request
     * @return mixed
     */
    public function update(ValidatorRequest $request, $id)
    {
        $validator = Validator::findOrFail($id);
        $validator->update($request->input());
        $validator = new ValidatorResource($validator);
        return $this->response->put($validator);
    }

    /**
     * 删除
     * @param Request $request
     * @return mixed
     */
    public function destroy($id)
    {
        $validator = Validator::findOrFail($id);
        if ($validator->fields->count() > 0)
            abort(400, '该验证规则已经被使用了,不能进行删除');
        $validator->delete();
        return $this->response->delete();
    }

    /**
     * 列表
     * @param Request $request
     */
    public function index()
    {
        $data = Validator::orderBy('id', 'desc')->get();
        $data = new ValidatorCollection($data);
        return $this->response->get($data);
    }

    /**
     * 详情
     * @param Request $request
     */
    public function show($id)
    {
        $validator = Validator::findOrFail($id);
        $validator = new ValidatorResource($validator);
        return $this->response->get($validator);
    }
}
