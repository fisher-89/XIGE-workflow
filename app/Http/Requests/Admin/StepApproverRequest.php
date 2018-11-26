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
                Rule::unique('step_approvers')->whereNull('deleted_at')->ignore($this->route('id'))
            ],
            'description' => [
                'nullable',
                'max:255',
                'string'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'description' => '描述'
        ];
    }
}
