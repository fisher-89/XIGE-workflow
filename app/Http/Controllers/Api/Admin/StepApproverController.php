<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StepApproverRequest;
use App\Models\StepApprover;
use App\Services\ResponseService;

class StepApproverController extends Controller
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
        $data = StepApprover::get();
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
    public function store(StepApproverRequest $request)
    {
        $data = StepApprover::create($request->input());
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
        $data = StepApprover::with('departments')->findOrFail($id);
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
    public function update(StepApproverRequest $request, $id)
    {
        $data = StepApprover::findOrFail($id);
        $data->update($request->input());
        return $this->response->put($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StepApprover::with(['departments', 'steps'])->findOrFail($id);
        if ($data->departments->count() > 0) {
            abort(400, '该审批视图下有所属部门，不能删除');
        }
        if ($data->steps->count() > 0) {
            $flowIds = $data->steps->pluck('flow_id')->all();
            $stepName = $data->steps->pluck('name')->all();
            abort(400, '流程ID为 (' . implode(',', $flowIds) . ') 下面步骤名 (' . implode(',', $stepName) . ')  使用了该审批视图');
        }
        $data->delete();
        return $this->response->delete();
    }
}
