<?php

namespace App\Http\Requests;

use App\Services\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;

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
        return FlowAuth::checkFlowAuthorize($this->flow->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->step = app('step')->getStartStepData($this->flow);//开始步骤数据

        $basicRules = [
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
                return ['form_data.' . $field->grid->key . '.*.' . $field->key => $field->name];
            }
            return ['form_data.' . $field->key => $field->name];
        })->toArray();
        return array_collapse([$fieldAttributes, [
            'form_data' => '表单数据',
        ]]);
    }
}
