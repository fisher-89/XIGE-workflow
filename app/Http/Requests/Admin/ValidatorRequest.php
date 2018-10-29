<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\Validator\Params;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !$this->validator || $this->validator->is_locked == 0;
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
                'max:20',
                'string',
                Rule::unique('validators', 'name')->ignore($this->validator->id ?? null)->whereNull('deleted_at'),
            ],
            'description' => [
                'string',
                'max:200',
            ],
            'type' => [
                'required',
                Rule::in(['regex', 'in', 'mimes']),
            ],
            'params' => [
                'string',
                'required',
                'max:255',
                new Params($this->type)
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'description' => '描述',
            'type' => '规则类型',
            'params' => '规则参数'
        ];
    }
}
