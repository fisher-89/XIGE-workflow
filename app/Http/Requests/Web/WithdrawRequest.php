<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WithdrawRequest extends FormRequest
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
            'flow_run_id' => [
                'required',
                Rule::exists('flow_run','id')
                    ->where('creator_sn', app('auth')->id())
                    ->where('status', 0)
                    ->whereNull('deleted_at')
            ]
        ];
    }

    public function attributes()
    {
        return [
            'flow_run_id' => '流程运行ID'
        ];
    }
}
