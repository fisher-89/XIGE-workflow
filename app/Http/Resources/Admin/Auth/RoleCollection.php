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
            // 关联员工筛选字段
            $role->staff = $role->staff->map(function($staff){
                return $staff->only(['staff_sn','realname']);
            });

            // 操作权限字段
            $role->handle = $role->handle->pluck('id');

            // 流程权限
            $role->flow_auth = $role->flowAuth->pluck('flow_number');
            $role->flow_auth_data = $role->flowAuth->map(function($flow){
                 $data = $flow->flow->only(['name','number']);
                 return $data;
            });

            // 表单权限
            $role->form_auth = $role->formAuth->pluck('form_number');
            $role->form_auth_data = $role->formAuth->map(function($form){
               $data = $form->form->only(['name','number']);
               return $data;
            });
            $role =  $role->only(['id','name','is_super','staff','handle','flow_auth','flow_auth_data','form_auth','form_auth_data']);
            return $role;
        })->all();
    }
}
