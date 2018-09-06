<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\Form\FieldDefaultValue;
use App\Rules\Admin\Form\FormFields;
use App\Rules\Admin\Form\GridFields;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormsRequest extends FormRequest
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
        $fieldsType = ['int', 'text', 'date', 'datetime', 'time', 'file', 'array', 'select', 'department', 'staff', 'shop', 'region'];//字段type类型
        $notInFields = ['id', 'run_id', 'created_at', 'updated_at', 'deleted_at'];//过滤字段
        return [
            'name' => [
                'required',
                'max:20',
                'string',
                Rule::unique('forms', 'name')->whereNull('deleted_at')->ignore($this->route('id')),
            ],
            'description' => [
                'string',
                'max:200',
                'nullable'
            ],
            'form_type_id' => [
                'required',
                Rule::exists('form_types', 'id')->whereNull('deleted_at')
            ],
            'sort' => [
                'integer',
                'between:0,255',
            ],
            'fields' => [
                'required',
                'array',
                new FormFields()//小数位数不为空验证最大值不能为空
            ],
            'fields.*.id' => [
                Rule::exists('fields', 'id')->where('form_id', $this->route('id'))->whereNull('deleted_at')
            ],
            'fields.*.key' => [
                'required',
                'regex:/^\w{1,20}$/',
                'max:20',
                'distinct',
                Rule::notIn($notInFields)
            ],
            'fields.*.name' => [
                'required',
                'max:20',
                'string'
            ],
            'fields.*.description' => [
                'nullable',
                'string',
                'max:200'
            ],
            'fields.*.type' => [
                'required',
                'max:20',
                'string',
                Rule::in($fieldsType)
            ],
            'fields.*.is_checkbox' => [
                'required',
                Rule::in([0, 1])
            ],
            'fields.*.condition' => [
                'nullable',
                'string'
            ],
            'fields.*.region_level' => [
                'nullable',
                'required_if:fields.*.type,region',
                Rule::in([1, 2, 3, 4])
            ],
            'fields.*.available_options' => [
                'array'
            ],
            'fields.*.available_options.value' => [
                'max:20',
            ],
            'fields.*.available_options.text' => [
                'max:100',
            ],
            'fields.*.min' => [
                'max:20',
            ],
            'fields.*.max' => [
                'max:20',
            ],
            'fields.*.scale' => [
                'nullable',
                'integer',
                'between:0,10'
            ],
            'fields.*.default_value' => [
                'nullable',
            ],
            'fields.*.options' => [
                'array',
                'required_if:fields.*.type,select'
            ],
            'fields.*.validator_id' => [
                'nullable',
                'array'
            ],
            'fields.*.validator_id.*' => [
                Rule::exists('validators', 'id')->whereNull('deleted_at')
            ],
            'grids' => [
                'array',
            ],
            'grids.*.name' => [
                'required',
                'string',
                'distinct',
                'max:20',
            ],
            'grids.*.key' => [
                'required',
                'string',
                'distinct',
                'max:20',
                Rule::notIn(array_pluck($this->fields, 'key'))//验证控件key与表单key不重复
            ],
            'grids.*.fields' => [
                'required',
                'array',
                new GridFields()//验证控件字段key不重复
            ],
            'grids.*.fields.*.id' => [
                Rule::exists('fields', 'id')->where('form_id', $this->route('id'))->whereNull('deleted_at')
            ],
            'grids.*.fields.*.key' => [
                'required',
                'regex:/^\w{1,20}$/',
                'max:20',
                Rule::notIn($notInFields)
            ],
            'grids.*.fields.*.name' => [
                'required',
                'max:20',
                'string'
            ],
            'grids.*.fields.*.description' => [
                'nullable',
                'string',
                'max:200'
            ],
            'grids.*.fields.*.type' => [
                'required',
                'max:20',
                'string',
                Rule::in($fieldsType)
            ],
            'grids.*.fields.*.is_checkbox' => [
                'required',
                Rule::in([0, 1])
            ],
            'grids.*.fields.*.condition' => [
                'nullable',
                'string'
            ],
            'grids.*.fields.*.region_level' => [
                'nullable',
                'required_if:grids.*.fields.*.type,region',
                Rule::in([1, 2, 3,4])
            ],
            'grids.*.fields.*.available_options' => [
                'array'
            ],
            'grids.*.fields.*.available_options.value' => [
                'max:20',
            ],
            'grids.*.fields.*.available_options.text' => [
                'max:100',
            ],
            'grids.*.fields.*.min' => [
                'max:20',
            ],
            'grids.*.fields.*.max' => [
                'max:20',
            ],
            'grids.*.fields.*.scale' => [
                'nullable',
                'integer',
                'between:0,10'
            ],
            'grids.*.fields.*.default_value' => [
                'nullable',
            ],
            'grids.*.fields.*.options' => [
                'array',
                'required_if:grids.*.fields.*.type,select'
            ],
            'grids.*.fields.*.validator_id' => [
                'nullable',
                'array'
            ],
            'grids.*.fields.*.validator_id.*' => [
                Rule::exists('validators', 'id')->whereNull('deleted_at')
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'description' => '描述',
            'form_type_id' => '表单分类',
            'sort' => '排序',
            //字段
            'fields' => '字段',
            'fields.*.id' => '字段ID',
            'fields.*.key' => '键名',
            'fields.*.name' => '名称',
            'fields.*.description' => '描述',
            'fields.*.type' => '字段类型',
            'fields.*.is_checkbox' => '是否多选',
            'fields.*.condition' => '控件条件',
            'fields.*.available_options' => '选择控件',
            'fields.*.available_options.value' => '选择控件value',
            'fields.*.available_options.text' => '选择控件text',
            'fields.*.region_level' => '地区级数',
            'fields.*.max' => '最大值',
            'fields.*.min' => '最小值',
            'fields.*.scale' => '小数位数',
            'fields.*.default_value' => '默认值',
            'fields.*.options' => '可选值',
            'fields.*.validator_id' => '验证规则',
            'fields.*.validator_id.*' => '验证规则ID',
            //字段列表
            'grids' => '列表控件',
            'grids.*.name' => '名称',
            'grids.*.key' => '键名',
            'grids.*.fields' => '字段',
            'grids.*.fields.*.id' => '字段ID',
            'grids.*.fields.*.key' => '键名',
            'grids.*.fields.*.name' => '名称',
            'grids.*.fields.*.description' => '描述',
            'grids.*.fields.*.type' => '字段类型',
            'grids.*.fields.*.is_checkbox' => '是否多选',
            'grids.*.fields.*.condition' => '控件条件',
            'grids.*.fields.*.region_level' => '地区级数',
            'grids.*.fields.*.available_options' => '选择控件',
            'grids.*.fields.*.available_options.value' => '选择控件value',
            'grids.*.fields.*.available_options.text' => '选择控件text',
            'grids.*.fields.*.max' => '最大值',
            'grids.*.fields.*.min' => '最小值',
            'grids.*.fields.*.scale' => '小数位数',
            'grids.*.fields.*.default_value' => '默认值',
            'grids.*.fields.*.options' => '可选值',
            'grids.*.fields.*.validator_id' => '验证规则',
            'grids.*.fields.*.validator_id.*' => '验证规则ID',
        ];
    }
}
