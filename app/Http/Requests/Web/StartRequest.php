<?php

namespace App\Http\Requests\Web;


use App\Repository\Web\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->flow_id && intval($this->flow_id))
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
        return [
            'flow_id' => [
                Rule::exists('flows', 'id')->where('is_active', 1)
            ],
            'timestamp' => [
                'numeric',
                'integer',
                'required'
            ],
            'next_step' => [
                'required',
                'array'
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
            'flow_id' => '流程ID',
            'timestamp' => '预提交时间戳',
            'next_step' => '下一步骤审批',
            'host'=>'审批详情地址',
            'cc_person'=>'抄送人',
            'cc_person.*.staff_sn'=>'抄送人工号',
            'cc_person.*.staff_name'=>'抄送人名字',
        ];
    }
}
