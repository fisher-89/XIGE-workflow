<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StepApproverRequest extends FormRequest
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
                'max:50',
                Rule::unique('step_approvers')->whereNull('deleted_at')->ignore($this->route('step_approver'))
            ],
            'description' => [
                'nullable',
                'max:255',
                'string'
            ],
            'departments' => [
                'array'
            ],
            'departments.*.department_id' => [
                'integer',
                'required',
                'distinct'
            ],
            'departments.*.department_name' => [
                'string',
                'required'
            ],
            'departments.*.approver_staff' => [
                'array',
                'required_without_all:departments.*.approver_roles,departments.*.approver_departments'
            ],
            'departments.*.approver_staff.*.value' => [
                'integer',
                'required',
            ],
            'departments.*.approver_staff.*.text' => [
                'string',
                'required'
            ],
            'departments.*.approver_roles' => [
                'array',
                'required_without_all:departments.*.approver_staff,departments.*.approver_departments'
            ],
            'departments.*.approver_roles.*.value' => [
                'integer',
                'required',
            ],
            'departments.*.approver_roles.*.text' => [
                'string',
                'required'
            ],
            'departments.*.approver_departments' => [
                'array',
                'required_without_all:departments.*.approver_roles,departments.*.approver_staff'
            ],
            'departments.*.approver_departments.*.value' => [
                'integer',
                'required',
            ],
            'departments.*.approver_departments.*.text' => [
                'string',
                'required'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'description' => '描述',
            'departments' => '部门',
            'departments.*.department_id' => '部门ID',
            'departments.*.department_name' => '部门名称',
            'departments.*.approver_staff' => '审批员工',
            'departments.*.approver_staff.*.value' => '审批员工工号',
            'departments.*.approver_staff.*.text' => '审批员工姓名',
            'departments.*.approver_roles' => '审批角色',
            'departments.*.approver_roles.*.value' => '审批角色ID',
            'departments.*.approver_roles.*.text' => '审批角色名称',
            'departments.*.approver_departments' => '审批部门',
            'departments.*.approver_departments.*.value' => '审批部门ID',
            'departments.*.approver_departments.*.text' => '审批部门名称',
        ];
    }
}
