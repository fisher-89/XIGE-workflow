<?php

namespace App\Http\Requests\Web;

use App\Models\Field;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FileRequest extends FormRequest
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
        $filenameExtension = Field::find($this->field_id)->validator->pluck('params')->all();
        return [
            'field_id' => [
                Rule::exists('fields', 'id')->where('type', 'file')
            ],
            'upFile' => [
                'required',
                'file',
                'image:' . implode(',', $filenameExtension),
            ]
        ];
    }

    public function attributes()
    {
        return [
            'field_id'=>'字段ID',
            'upFile' => '文件',
        ];
    }
}
