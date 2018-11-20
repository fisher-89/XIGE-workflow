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
                Rule::unique('flows', 'name')->whereNull('deleted_at')->ignore($this->route('id')),
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
            'accept_start_callback'=>[
                'required',
                Rule::in([0,1])
            ],
            'end_callback_uri' => [
                'nullable',
                'string',
                'url',
                'max:255',
            ],
            'accept_end_callback'=>[
              'required',
              Rule::in([0,1])
            ],
            'send_message' => [
                'required',
                Rule::in([0, 1])
            ],
            'is_client'=>[
                'required',
                Rule::in([0, 1])
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
            'steps.*.available_fields' => [
                'array'
            ],
            'steps.*.available_fields.*' => [
                new FormFields($this->form_id)
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
            'steps.*.approver_type' => [
                'required',
                Rule::in([0, 1, 2, 3])
            ],
            'steps.*.step_approver_id' => [
                'nullable',
                'required_if:steps.*.approver_type,2'
            ],
            'steps.*.approvers' => [
                'array',
                'required_if:steps.*.approver_type,1,3'
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
            'steps.*.accept_start_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.check_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_check_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.approve_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_approve_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.reject_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_reject_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.transfer_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_transfer_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.end_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_end_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.withdraw_callback_uri' => [
                'string',
                'url',
                'max:255'
            ],
            'steps.*.accept_withdraw_callback' => [
                'required',
                Rule::in([0,1])
            ],
            'steps.*.x' => [
                'max:50',
            ],
            'steps.*.y' => [
                'max:50',
            ],
            'steps.*.send_todo' => [
                'required',
                Rule::in([0, 1])
            ],
            'steps.*.send_start' => [
                'required',
                Rule::in([0, 1])
            ],
            'steps.*.is_cc' => [
                'required',
                Rule::in([0, 1])
            ],
            'steps.*.cc_person' => [
                'array',
                'nullable'
            ],
            /*--------步骤验证end------*/
        ];
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
            'accept_start_callback'=>'开始回调接收返回值',
            'end_callback_uri' => '结束回调地址',
            'accept_end_callback' => '结束回调接收返回值',
            'send_message' => '发送消息',
            'is_client'=>'是否客服端发起',
            //权限
            'flows_has_staff' => '发起人',
            'flows_has_roles' => '发起角色',
            'flows_has_departments' => '发起部门',
            //步骤
            'steps' => '步骤',
            'steps.*.name' => '步骤名称',
            'steps.*.description' => '步骤描述',
            'steps.*.step_key' => '步骤标识',
            'steps.*.prev_step_key' => '上一步标识',
            'steps.*.prev_step_key.*' => '上一步标识key',
            'steps.*.next_step_key' => '下一步标识',
            'steps.*.next_step_key.*' => '下一步标识key',
            'steps.*.available_fields' => '可用字段',
            'steps.*.available_fields.*' => '可用字段key',
            'steps.*.hidden_fields' => '隐藏字段',
            'steps.*.hidden_fields.*' => '隐藏字段key',
            'steps.*.editable_fields' => '可编辑字段',
            'steps.*.editable_fields.*' => '可编辑字段key',
            'steps.*.required_fields' => '必填字段',
            'steps.*.required_fields.*' => '必填字段key',
            'steps.*.approver_type' => '审批人类型',
            'steps.*.step_approver_id' => '审批人配置ID',
            'steps.*.approvers' => '审批',
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
            'steps.*.accept_start_callback' => '开始回调接收返回值',
            'steps.*.accept_check_callback' => '查看回调接收返回值',
            'steps.*.accept_approve_callback' => '通过回调接收返回值',
            'steps.*.accept_reject_callback' => '驳回回调接收返回值',
            'steps.*.accept_transfer_callback' => '转交回调接收返回值',
            'steps.*.accept_end_callback' => '结束回调接收返回值',
            'steps.*.accept_withdraw_callback' => '撤回回调接收返回值',
            'steps.*.x' => '坐标X轴',
            'steps.*.y' => '坐标Y轴',
            'steps.*.send_todo' => '发送待办',
            'steps.*.send_start' => '发起人信息',
            'steps.*.is_cc'=>'是否抄送',
            'steps.*.cc_person' => '抄送人',
        ];
    }
}
