<?php

namespace App\Http\Requests\Web;


use App\Repository\Web\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;

class StartRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->flow->id && intval($this->flow->id))
            return FlowAuth::checkFlowAuthorize($this->flow->id);
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
//            'step_run_id' => [
//                'nullable',
//                'numeric',
//                'integer',
//                Rule::exists('step_run')->where('flow_id', $this->flow->id)->whereNull('deleted_at')
//            ],
            'timestamp' => [
                'numeric',
                'integer',
                'required'
            ],
            'next_step' => [
                'required',
                'array'
            ]
        ];

    }

    public function attributes()
    {
        return [
            'step_run_id' => '步骤运行ID',
            'timestamp' => '预提交时间戳',
            'next_step' => '下一步骤审批'
        ];
    }
}
