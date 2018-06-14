<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DeliverRequest extends FormRequest
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
            'step_run_id' => [
                'required',
                Rule::exists('step_run', 'id')
                    ->where('approver_sn', Auth::id())
                    ->where('action_type', 2)
                    ->whereNull('deleted_at')
            ],
            'deliver' => [
                'array',
                'required'
            ],
            'deliver.*.approver_sn' => [
                'required',
                'numeric',
                'max:999999',
                'min:100000',
            ],
            'deliver.*.approver_name' => [
                'required',
                'string',
                'between:2,10'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'step_run_id' => '该步骤不能进行转交',
            'deliver' => '转交数据',
            'deliver.*.approver_sn' => '转交人工号',
            'deliver.*.approver_name' => '转交人名字',
        ];
    }
}
