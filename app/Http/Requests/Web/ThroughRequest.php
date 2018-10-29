<?php

namespace App\Http\Requests\Web;

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
            'step_run_id' => [
                'nullable',
                'numeric',
                'integer',
                Rule::exists('step_run','id')
                    ->where('approver_sn', Auth::user()->staff_sn)
                    ->where('action_type',0)
                    ->whereNull('deleted_at')
            ],
            'timestamp' => [
                'numeric',
                'integer',
                'required'
            ],
            'next_step' => [
                'array'
            ],
            'remark' => [
                'string',
                'max:200'
            ],
            'host'=>[
                'required',
                'url'
            ],
            //抄送人
            'cc_person'=>[
                'array'
            ],
            'cc_person.*.staff_sn'=>[
                'numeric',
                'between:100000,999999'
            ],
            'cc_person.*.staff_name'=>[
                'string',
                'max:20'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'step_run_id' => '步骤运行ID',
            'timestamp' => '预提交时间戳',
            'next_step' => '下一步骤审批',
            'remark'=>'备注',
            'host'=>'审批详情地址',
            'cc_person'=>'抄送人',
            'cc_person.*.staff_sn'=>'抄送人工号',
            'cc_person.*.staff_name'=>'抄送人名字',
        ];
    }
}
