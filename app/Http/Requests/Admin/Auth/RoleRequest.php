<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('auth_roles')->ignore($this->route('id'))->whereNull('deleted_at')
            ],
            'is_super' => [
                'required',
                Rule::in([0, 1])
            ],
            'staff' => [
                'array',
            ],
            'staff.*.staff_sn' => [
                'distinct',
                'numeric',
                'between:100000,999999'
            ],
            'handle' => [
                'array'
            ],
            'handle.*' => [
                'integer',
                Rule::in([1, 2, 3, 4])
            ],
            'flow_auth' => [
                'array'
            ],
            'flow_auth.*' => [
                'integer'
            ],
            'form_auth' => [
                'array'
            ],
            'form_auth.*' => [
                'integer'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => '角色名称',
            'is_super'=>'是否超级管理员',
            'staff' => '用户',
            'staff.*.staff_sn' => '用户工号',
            'handle' => '操作',
            'handle.*' => '操作ID',
            'flow_auth' => '流程',
            'flow_auth.*' => '流程ID',
            'form_auth' => '表单',
            'form_auth.*' => '表单ID'
        ];
    }
}
