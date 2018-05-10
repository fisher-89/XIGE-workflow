<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ThroughRequest extends FormRequest
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
            'flow_id' => [
                'required',
                'integer',
                Rule::exists('flows', 'id')->whereNull('deleted_at')
            ],
            'form_data' => [
                'present',
                'array',
            ],
            'step_run_id' => [
                'required',
                'integer',
                Rule::exists('step_run', 'id')
                    ->where('flow_id', $this->flow_id)
                    ->where('action_type', 0)
                    ->where('approver_sn', Auth::user()->staff_sn)
                    ->whereNull('deleted_at')
            ],
            'approvers'=>[
              'array'
            ],
            'approvers.*.step_key' => [
                'integer',
                'required'
            ],
            'approvers.*.staff_sn' => [
                'integer',
                'required'
            ],
            'approvers.*.realname' => [
                'string',
                'required'
            ],
            'remark' => [
                'string'
            ]
        ];
    }
}
