<?php

namespace App\Http\Requests\Web;

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
                    ->where('action_type', 0)
                    ->whereNull('deleted_at')
            ],
            'approver_sn' => [
                'required',
                'numeric',
                'max:999999',
                'min:100000',
            ],
            'approver_name' => [
                'required',
                'string',
                'between:2,10'
            ],
            'remark' => [
                'string',
                'max:200'
            ],
            'host'=>[
                'required',
                'url'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'step_run_id' => '步骤运行ID',
            'approver_sn' => '转交人工号',
            'approver_name' => '转交人名字',
            'remark' => '备注',
            'host'=>'审批详情地址',
        ];
    }
}
