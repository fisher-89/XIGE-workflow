<?php

namespace App\Http\Resources\Admin\Auth;

use Illuminate\Http\Resources\Json\Resource;

class RoleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->only(['id','name','is_super','staff','handle_flow','handle_flow_type','handle_form','handle_form_type','export_flow','export_form']);
        $data['staff'] =  $this->staff->map(function($staff){
            return $staff->only(['staff_sn','realname']);
        });
        return $data;
    }
}
