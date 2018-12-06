<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Requests\Admin\Auth\RoleRequest;
use App\Models\Auth\AuthRole;
use App\Services\Admin\Auth\RoleService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    protected $response;
    protected $role;

    public function __construct(ResponseService $responseService,RoleService $roleService)
    {
        $this->response = $responseService;
        $this->role = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AuthRole::with('staff','handle','flowAuth.flow','formAuth.form')->get();
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
    public function store(RoleRequest $request)
    {
        $data = $this->role->store();
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
        $data = AuthRole::with('staff','handle','flowAuth.flow','formAuth.form')->findOrFail($id);
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
    public function update(RoleRequest $request, $id)
    {
        $data = $this->role->update($id);
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
        AuthRole::destroy($id);
        return $this->response->delete();
    }
}