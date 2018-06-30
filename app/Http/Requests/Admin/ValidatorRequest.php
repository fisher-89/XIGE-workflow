<?php

namespace App\Http\Requests\Admin;

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
        $paramsRules = [
            'string',
            'required',
            'max:255',
        ];
        switch ($this->type) {
            case 'regex':
                $paramsRules[] = 'regex:/^\/.*\/$/';
                break;
            case 'in':
//                $paramsRules[] = 'regex:/^([\w\-]+\,)*[\w\-]+$/';
                $paramsRules[] = 'regex:/^.*$/';
                break;
            case 'mimes':
                $paramsRules[] = 'regex:/^(\w+\,)*\w+$/';
                break;
        }
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
            'params' => $paramsRules,
        ];
    }

    public function attributes()
    {
        return [
            'name' => '规则名称',
            'description' => '规则描述',
            'type'=>'规则类型',
            'params' => '规则参数'
        ];
    }
}
