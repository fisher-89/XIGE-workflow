<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RejectRequest extends FormRequest
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
            'step_run_id'=>[
                'required',
                Rule::exists('step_run','id')
                    ->where('approver_sn',app('auth')->id())
                    ->where('action_type',0)
                    ->whereNull('deleted_at')
            ],
            'remark'=>[
                'string',
                'max:200'
            ]
        ];
    }

    public function attributes()
    {
        return[
          'step_run_id'=>'步骤运行ID',
            'remark'=>'操作备注',
        ];
    }
}
