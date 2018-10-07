<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\StepDepartmentApproverRequest;
use App\Models\StepDepartmentApprover;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StepDepartmentApproverController extends Controller
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
        $data = StepDepartmentApprover::get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepDepartmentApproverRequest $request)
    {
        $data = StepDepartmentApprover::create($request->input());
        return $this->response->post($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = StepDepartmentApprover::find($id);
        return $this->response->get($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StepDepartmentApproverRequest $request, $id)
    {
        $data = StepDepartmentApprover::find($id);
        $data->update($request->input());
        return $this->response->put($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StepDepartmentApprover::destroy($id);
        return $this->response->delete();
    }
}
