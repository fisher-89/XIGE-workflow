<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StepDepartmentApproverRequest extends FormRequest
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
            'step_approver_id' => [
                Rule::exists('step_approvers', 'id')->whereNull('deleted_at')
            ],
            'department_id' => [
                'integer',
                'required',
                Rule::unique('step_department_approvers', 'department_id')
                    ->where('step_approver_id', $this->step_approver_id)
                    ->ignore($this->route('step_department_approver'))
            ],
            'department_name' => [
                'string',
                'required'
            ],
            'approver_staff' => [
                'array',
                'required_without_all:dapprover_roles,approver_departments'
            ],
            'approver_staff.*.value' => [
                'integer',
                'required',
            ],
            'approver_staff.*.text' => [
                'string',
                'required'
            ],
            'approver_roles' => [
                'array',
                'required_without_all:approver_staff,approver_departments'
            ],
            'approver_roles.*.value' => [
                'integer',
                'required',
            ],
            'approver_roles.*.text' => [
                'string',
                'required'
            ],
            'approver_departments' => [
                'array',
                'required_without_all:approver_roles,approver_staff'
            ],
            'approver_departments.*.value' => [
                'integer',
                'required',
            ],
            'approver_departments.*.text' => [
                'string',
                'required'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'step_approver_id' => '审批ID',
            'department_id' => '所属部门ID',
            'department_name' => '所属部门',
            'approver_staff' => '员工',
            'approver_staff.*.value' => '员工工号',
            'approver_staff.*.text' => '员工姓名',
            'approver_roles' => '角色',
            'approver_roles.*.value' => '角色ID',
            'approver_roles.*.text' => '角色名称',
            'approver_departments' => '部门',
            'approver_departments.*.value' => '部门ID',
            'approver_departments.*.text' => '部门名称',
        ];
    }
}
