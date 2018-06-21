<?php

namespace App\Http\Requests;

use App\Repository\FlowRepository;
use App\Services\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PresetRequest extends FormRequest
{
    protected $step;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return FlowAuth::checkFlowAuthorize($this->flow->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $flowRepository = new FlowRepository();
        if ($this->has('step_run_id') && intval($this->step_run_id)) {
            //通过 预提交
            $this->step = $flowRepository->getCurrentStep($this->step_run_id);
        } else {
            //发起 预提交
            $this->step = $flowRepository->getFlowFirstStep($this->flow);
        }

        $basicRules = [
            'step_run_id' => [
                Rule::exists('step_run', 'id')->where('flow_id', $this->flow->id)
            ],
            'form_data' => [
                'present',
                'array',
            ],
        ];
        $fieldsRules = app('validation')->makeStepFormValidationRules($this->step);

        return array_collapse([$basicRules, $fieldsRules]);
    }

    public function attributes()
    {
        $fieldAttributes = $this->step->flow->form->fields->mapWithKeys(function ($field) {
            if ($field->grid) {
                return ['form_data.' . $field->grid->key . '.*.' . $field->key => $field->name, 'form_data.' . $field->grid->key => $field->grid->name];
            }
            return ['form_data.' . $field->key => $field->name];
        })->toArray();
        return array_collapse([$fieldAttributes, [
            'step_run_id' => '步骤运行ID',
            'form_data' => '表单数据',
        ]]);
    }
}
