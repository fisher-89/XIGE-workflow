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
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'is_super'=>$this->is_super,
            'staff'=>$this->staff->map(function($staff){
                return $staff->only(['staff_sn','realname']);
            }),
            'handle'=>$this->handle->pluck('id')->all(),
            'flow_auth'=>$this->flowAuth->pluck('flow_number')->all(),
            'flow_auth_data'=>$this->flowAuth->map(function($flow){
                $data = $flow->flow->only(['name','number']);
                return $data;
            }),
            'form_auth'=>$this->formAuth->pluck('form_number')->all(),
            'form_auth_data'=>$this->formAuth->map(function($form){
                $data = $form->form->only(['name','number']);
                return $data;
            })
        ];
    }
}
