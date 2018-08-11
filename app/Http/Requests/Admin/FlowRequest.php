<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\DepartmentExists;
use App\Rules\Admin\Flow\FormFields;
use App\Rules\Admin\Flow\MergeType;
use App\Rules\Admin\RoleExists;
use App\Rules\Admin\StaffExists;
use App\Rules\Admin\Flow\StepApprover;
use App\Rules\Admin\Flow\StepGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FlowRequest extends FormRequest
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
        $stepKeys = array_pluck($this->steps, 'step_key');
        $rule = [
            /*----流程验证start-----*/
            'name' => [
                'required',
                'max:20',
                'string',
                Rule::unique('flows', 'name')->whereNull('deleted_at')->ignore($this->route('id') ?? null),
            ],
            'description' => [
                'nullable',
                'string',
                'max:200'
            ],
            'flow_type_id' => [
                'required',
                Rule::exists('flow_types', 'id')->whereNull('deleted_at')
            ],
            'form_id' => [
                'required',
                Rule::exists('forms', 'id')->whereNull('deleted_at')
            ],
            'sort' => [
                'integer',
                'between:0,255',
            ],
            'is_active' => [
                'required',
                'integer',
                Rule::in([0, 1])
            ],
            'start_callback_uri' => [
                'nullable',
                'string',
                'url',
                'max:255',
            ],
            'end_callback_uri' => [
                'nullable',
                'string',
                'url',
                'max:255',
            ],
            /*--------流程验证end-------*/

            /*------流程权限start----*/
            'flows_has_staff' => [
                'array',
                new StaffExists('发起人')
            ],
            'flows_has_roles' => [
                'array',
                new RoleExists('发起角色')
            ],
            'flows_has_departments' => [
                'array',
                new DepartmentExists('发起部门')
            ],
            /*------流程权限end----*/
            /*--------步骤验证start------*/
            'steps' => [
                'required',
                'array',
                'min:2',
                new StepGroup,
                new StepApprover,
                new MergeType(),  //验证合并步骤
            ],
            'steps.*.name' => [
                'required',
                'max:20',
                'string'
            ],
            'steps.*.description' => [
                'string',
                'nullable',
                'max:200'
            ],
            'steps.*.step_key' => [
                'distinct',
                'numeric',
                'min:0'
            ],
            'steps.*.prev_step_key' => [
                'required_without:steps.*.next_step_key',
                'array',
            ],
            'steps.*.prev_step_key.*' => [
                'different:steps.*.step_key',
                Rule::in($stepKeys),
                'not_in_array:steps.*.next_step_key',
            ],
            'steps.*.next_step_key' => [
                'required_without:steps.*.prev_step_key',
                'array',
            ],
            'steps.*.next_step_key.*' => [
                'different:steps.*.step_key',
                Rule::in($stepKeys),
                'not_in_array:steps.*.prev_step_key',
            ],
            'steps.*.hidden_fields' => [
                'array'
            ],
            'steps.*.hidden_fields.*' => [
                new FormFields($this->form_id)
            ],
            'steps.*.editable_fields' => [
                'array'
            ],
            'steps.*.editable_fields.*' => [
                new FormFields($this->form_id)
            ],
            'steps.*.required_fields' => [
                'array'
            ],
            'steps.*.required_fields.*' => [
                new FormFields($this->form_id)
            ],
            'steps.*.approvers' => [
                'array'
            ],
            'steps.*.approvers.staff' => [
                'array',
                new StaffExists('审批人'),
            ],
            'steps.*.approvers.roles' => [
                'array',
                new RoleExists('角色'),
            ],
            'steps.*.approvers.departments' => [
                'array',
                new DepartmentExists('部门'),
            ],
            'steps.*.allow_condition' => [
                'string',
                'max:800'
            ],
            'steps.*.skip_condition' => [
                'string',
                'max:800'
            ],
            'steps.*.reject_type' => [
                'required',
                'integer',
                Rule::in([0, 1, 2])
            ],
            'steps.*.concurrent_type' => [
                'required',
                'integer',
                Rule::in([0, 1, 2])
            ],
            'steps.*.merge_type' => [
                'required',
                'integer',
                Rule::in([0, 1])
            ],
            'steps.*.start_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.check_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.approve_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.reject_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.transfer_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.end_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.withdraw_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            /*--------步骤验证end------*/
        ];
        if ($this->merge_type == 1) {
            $rule['steps.*.approvers.staff'] = $rule['steps.*.approvers.staff'][] = 'required';
            $rule['steps.*.approvers.roles'] = [];
            $rule['steps.*.approvers.departments'] = [];
        }
        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => '流程名称',
            'description' => '流程描述',
            'flow_type_id' => '流程分类',
            'form_id' => '表单',
            'sort' => '排序',
            'is_active' => '是否启用',
            'start_callback_uri' => '发起回调地址',
            'end_callback_uri' => '结束回调地址',
            //权限
            'flows_has_staff' => '发起人',
            'flows_has_roles' => '发起角色',
            'flows_has_departments' => '发起部门',
            //步骤
            'steps'=>'步骤',
            'steps.*.name' => '步骤名称',
            'steps.*.description' => '步骤描述',
            'steps.*.step_key' => '步骤标识',
            'steps.*.prev_step_key'=>'上一步标识',
            'steps.*.prev_step_key.*'=>'上一步标识key',
            'steps.*.next_step_key'=>'下一步标识',
            'steps.*.next_step_key.*'=>'下一步标识key',
            'steps.*.hidden_fields' => '隐藏字段',
            'steps.*.hidden_fields.*' => '隐藏字段key',
            'steps.*.editable_fields' => '可编辑字段',
            'steps.*.editable_fields.*' => '可编辑字段key',
            'steps.*.required_fields' => '必填字段',
            'steps.*.required_fields.*' => '必填字段key',
            'steps.*.approvers' => '审批',
            'steps.*.approvers.staff' => '审批人',
            'steps.*.approvers.roles' => '角色',
            'steps.*.approvers.departments' => '部门',
            'steps.*.allow_condition' => '访问条件',
            'steps.*.skip_condition' => '略过条件',
            'steps.*.reject_type' => '退回类型',
            'steps.*.concurrent_type' => '并发类型',
            'steps.*.merge_type' => '合并类型',
            'steps.*.start_callback_uri' => '开始回调地址',
            'steps.*.check_callback_uri' => '查看回调地址',
            'steps.*.approve_callback_uri' => '通过回调地址',
            'steps.*.reject_callback_uri' => '驳回回调地址',
            'steps.*.transfer_callback_uri' => '转交回调地址',
            'steps.*.end_callback_uri' => '结束回调地址',
            'steps.*.withdraw_callback_uri' => '撤回回调地址',
        ];
    }
}
