<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\CheckOaApiRequest;
use App\Http\Requests\Admin\FieldApiConfigurationRequest;
use App\Repository\ApiConfigurationRepository;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FieldApiConfiguration;

class FieldApiConfigurationController extends Controller
{
    protected $response;

    public function __construct(ResponseService $responseService)
    {
        $this->response = $responseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FieldApiConfiguration::orderBy('id', 'desc')->get();
        return $this->response->get($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldApiConfigurationRequest $request)
    {
        $data = FieldApiConfiguration::create($request->input());
        return $this->response->post($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FieldApiConfiguration::find($id);
        return $this->response->get($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FieldApiConfigurationRequest $request, $id)
    {
        $data = FieldApiConfiguration::find($id);
        if ($data->fields && count($data->fields) > 0) {
            abort(400, '该接口配置已被表单ID为 ' . implode(',', $data->fields->pluck('form_id')->all()) . '使用了');
        }
        $data->update($request->input());
        return $this->response->put($data->makeHidden('fields'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FieldApiConfiguration::find($id);
        if (is_null($data))
            abort(404, '该接口配置不存在');
        if ($data->fields && count($data->fields) > 0) {
            abort(400, '该接口配置已被表单ID为 ' . implode(',', $data->fields->pluck('form_id')->all()) . '使用了。不能进行删除');
        }
        $data->delete();
        return $this->response->delete();
    }

    /**
     * 检查OA接口地址
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function checkOaApi(Request $request)
    {
        $this->validate($request, [
            'url' => [
                'required',
                'url'
            ]
        ], [], ['url' => '接口地址']);
        try {
            $result = app('curl')->get($request->input('url'));
        } catch (\Exception $e) {
            abort(400, '接口地址错误');
        }
        $columns = array_keys($result[0]);
        return $this->response->post($columns);
    }

    /**
     * 获取OA接口数据
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getOaApi($id, ApiConfigurationRepository $apiConfigurationRepository)
    {
        $data = $apiConfigurationRepository->getOaApiConfigurationResult($id);
        return $this->response->get($data);
    }
}
