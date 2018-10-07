<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\StepApproverRequest;
use App\Models\StepApprover;
use App\Services\Admin\StepApproverService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StepApproverController extends Controller
{
    protected $response;
    protected $stepApprover;

    public function __construct(ResponseService $responseService,StepApproverService $stepApproverService)
    {
        $this->response = $responseService;
        $this->stepApprover = $stepApproverService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StepApprover::with('departments')->get();
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
    public function store(StepApproverRequest $request)
    {
        $data = $this->stepApprover->store($request);
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
        $data = StepApprover::with('departments')->find($id);
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
    public function update(StepApproverRequest $request, $id)
    {
        $data = $this->stepApprover->update($request,$id);
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
        StepApprover::destroy($id);
        return $this->response->delete();
    }
}
