<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\Form\FieldApiConfigurationUrl;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FieldApiConfigurationRequest extends FormRequest
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
        $result = $this->getApiConfigurationColumn();

        $rule =  [
            'name' => [
                'required',
                'max:20',
                Rule::unique('field_api_configuration')->ignore($this->route('id'))->whereNull('deleted_at')
            ],
            'url' => [
                'required',
                'url',
                'max:255',
                new FieldApiConfigurationUrl($result)
            ],
            'value' => [
                'required',
                'max:50',
                'string'
            ],
            'text' => [
                'required',
                'max:50',
                'string'
            ]
        ];
        if($result['ok']){
            $rule['value'][] = 'in:'.implode(',',$result['column']);
            $rule['text'][] = 'in:'.implode(',',$result['column']);
        }
        return $rule;
    }

    /**
     * 获取接口配置字段
     */
    protected function getApiConfigurationColumn()
    {
        try{
            $result = app('curl')->get($this->url);
            $columns = array_keys($result[0]);
            return [
              'ok'=>true,
              'column'=>$columns
            ];
        }catch(\Exception $e){
            return [
              'ok'=>false
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'url' => '接口地址',
            'value' => '实际值',
            'text' => '显示文本'
        ];
    }
}
