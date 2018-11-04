<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormTypeRequest extends FormRequest
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
            'name' => [
                'required',
                'max:20',
                'string',
                Rule::unique('form_types', 'name')->whereNull('deleted_at')->ignore($this->route('id')),
            ],
            'sort' => [
                'integer',
                'between:0,255',
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'sort' => '排序'
        ];
    }
}
