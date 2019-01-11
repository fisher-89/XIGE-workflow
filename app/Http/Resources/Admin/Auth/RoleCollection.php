<?php

namespace App\Http\Resources\Admin\Auth;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($role){
            $role->staff =  $role->staff->map(function($staff){
                return $staff->only(['staff_sn','realname']);
            });
            $data = $role->only(['id','name','is_super','staff','handle_flow','handle_flow_type','handle_form','handle_form_type','export_flow','export_form']);
            return $data;
        })->all();
    }
}
