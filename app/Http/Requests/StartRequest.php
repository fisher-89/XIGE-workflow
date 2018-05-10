<?php

namespace App\Http\Requests;

use App\Models\Flow;
use App\Models\Step;
use App\Services\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StartRequest extends FormRequest
{
    protected $step;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->has('flow_id'))
            return FlowAuth::checkFlowAuthorize($this->flow_id);
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->step = app('step')->getStartStep($this->flow_id);

        if ($this->isMethod('GET')) {
            return [
                'flow_id' => [
                    'required',
                    'integer',
                    Rule::exists('flows', 'id')->whereNull('deleted_at')
                ],
            ];
        } else {
            $basicRules = [
                'flow_id' => [
                    'required',
                    'integer',
                    Rule::exists('flows', 'id')->whereNull('deleted_at')
                ],
                'form_data' => ['present', 'array'],
                'approvers' => ['required', 'array'],
                'approvers.*.step_key' => [
                    'integer',
                    'required',
                    'distinct',
                    Rule::in(implode(',', $this->step->next_step_key))
                ],
                'approvers.*.staff_sn' => ['integer', 'required'],
                'approvers.*.realname' => ['string', 'required'],
            ];
            $fieldsRules = app('validation')->makeStepFormValidationRules($this->step);
            return array_collapse([$basicRules, $fieldsRules]);
        }
    }

    public function attributes()
    {
        $fieldAttributes = $this->step->flow->form->fields->mapWithKeys(function ($field) {
//            if($field->grid){
//                return['form_data.'.$field->grid->key.'.*.'.$field->key=>$field->name];
//            }
            return ['form_data.' . $field->key => $field->name];
        })->toArray();
        return array_collapse([$fieldAttributes, [
            'flow_id' => '流程ID',
            'form_data' => '表单数据',
            'approvers.*.step_key' => '步骤',
            'approvers.*.staff_sn' => '审批人员工编号',
            'approvers.*.realname' => '审批人员',
        ]]);
    }
}
