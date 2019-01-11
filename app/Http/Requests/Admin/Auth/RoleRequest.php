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
            'handle_flow' => [
                'array'
            ],
            'handle_flow.*.number' => [
                'integer',
            ],
            'handle_flow.*.name' => [
                'string',
                'max:20'
            ],
            'handle_flow_type'=>[
                'array'
            ],
            'handle_flow_type.*'=>[
                Rule::in([1,2,3])
            ],
            'handle_form' => [
                'array'
            ],
            'handle_form.*.number' => [
                'integer',
            ],
            'handle_form.*.name' => [
                'string',
                'max:20'
            ],
            'handle_form_type'=>[
                'array'
            ],
            'handle_form_type.*'=>[
                Rule::in([1,2,3])
            ],
            'export_flow'=>[
                'array'
            ],
            'export_flow.*.number' => [
                'integer',
            ],
            'export_flow.*.name' => [
                'string',
                'max:20'
            ],
            'export_form'=>[
                'array'
            ],
            'export_form.*.number' => [
                'integer',
            ],
            'export_form.*.name' => [
                'string',
                'max:20'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '角色名称',
            'is_super'=>'超级管理员',
            'staff' => '关联员工',
            'staff.*.staff_sn' => '关联员工工号',
            'handle_flow' => '可操作流程',
            'handle_flow.*.number' => '可操作流程编号',
            'handle_flow.*.name' => '可操作流程名称',
            'handle_flow_type'=>'操作类型',
            'handle_flow_type.*'=>'操作类型值',
            'handle_form' => '可操作表单',
            'handle_form.*.number' => '可操作表单编号',
            'handle_form.*.name' => '可操作表单名称',
            'handle_form_type'=>'操作类型',
            'handle_form_type.*'=>'操作类型值',
            'export_flow'=>'可导出流程',
            'export_flow.*.number'=>'可导出流程编号',
            'export_flow.*.name'=>'可导出流程名称',
            'export_form'=>'可导出表单',
            'export_form.*.number'=>'可导出表单编号',
            'export_form.*.name'=>'可导出表单名称',
        ];
    }
}
