<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11/011
 * Time: 9:08
 */

namespace App\Http\Requests\Admin\Form;


use Illuminate\Validation\Rule;

class FormValidator
{
    use TextType,
        IntType,
        DateType,
        DateTimeType,
        TimeType,
        SelectType,
        ArrayType,
        RegionType,
        FileType,
        StaffType,
        DepartmentType,
        ShopType,
        ApiType;

    protected $msg = [
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
        'fields.*.field_api_configuration_id' => '字段接口配置ID',
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
        'grids.*.fields.*.field_api_configuration_id' => '字段接口配置ID',
        'grids.*.fields.*.validator_id' => '验证规则',
        'grids.*.fields.*.validator_id.*' => '验证规则ID',
    ];

    public function rules($request)
    {
        $formRule = $this->formRule();
        $fieldRule = $this->getFieldRule($request);
        return array_collapse([$formRule, $fieldRule]);
    }

    protected function formRule()
    {
        return [
            'name' => [
                'required',
                'max:20',
                'string',
                Rule::unique('forms', 'name')->whereNull('deleted_at')->ignore(request()->route('id')),
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
            ]
        ];
    }

    protected function getFieldRule($request)
    {
        $fieldsType = ['int', 'text', 'date', 'datetime', 'time', 'file', 'array', 'select', 'department', 'staff', 'shop', 'region', 'api'];//字段type类型
        $notInFields = ['id', 'run_id', 'created_at', 'updated_at', 'deleted_at'];//过滤字段
        $rule = [
            'fields' => [
                'required',
                'array',
            ],
            'fields.*.id' => [
                Rule::exists('fields', 'id')->where('form_id', request()->route('id'))->whereNull('deleted_at')
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
            'fields.*.available_options' => [
                'array'
            ],
            'fields.*.available_options.value' => [
                'max:20',
            ],
            'fields.*.available_options.text' => [
                'max:100',
            ],
            'fields.*.field_api_configuration_id' => [
                'nullable',
                Rule::exists('field_api_configuration', 'id')
                    ->whereNull('deleted_at'),
                'required_if:fields.*.type,api'
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
                Rule::notIn(array_pluck($request->fields, 'key'))//验证控件key与表单key不重复
            ],
            'grids.*.fields' => [
                'required',
                'array',
            ],
            'grids.*.fields.*.id' => [
                Rule::exists('fields', 'id')->where('form_id', request()->route('id'))->whereNull('deleted_at')
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
            'grids.*.fields.*.available_options' => [
                'array'
            ],
            'grids.*.fields.*.available_options.value' => [
                'max:20',
            ],
            'grids.*.fields.*.available_options.text' => [
                'max:100',
            ],
            'grids.*.fields.*.field_api_configuration_id' => [
                'nullable',
                Rule::exists('field_api_configuration', 'id')
                    ->whereNull('deleted_at'),
                'required_if:fields.*.type,api'
            ],
            'grids.*.fields.*.validator_id' => [
                'nullable',
                'array'
            ],
            'grids.*.fields.*.validator_id.*' => [
                Rule::exists('validators', 'id')->whereNull('deleted_at')
            ],
        ];

        //获取字段规则
        $fieldRule = $this->getFieldsRule($request->fields);
        $rule = array_collapse([$rule, $fieldRule]);

        if ($request->has('grids') && $request->input('grids')) {
            //列表控件规则
            foreach ($request->grids as $key => $grid) {
                $fieldRule = $this->getFieldsRule($grid['fields'], $key);
                $rule = array_collapse([$rule, $fieldRule]);
            }
        }
        return $rule;
    }

    public function message()
    {
        return $this->msg;
    }

    /**
     * 字段验证规则
     * @param $fields
     * @param $rule
     * @param $gridIndex
     * @return array
     */
    protected function getFieldsRule($fields, $gridIndex = null)
    {
        $rule = [];
        foreach ($fields as $key => $field) {
            switch ($field['type']) {
                case 'text':
                    $typeRule = $this->getTextTypeRule($key, $field, $gridIndex);
                    break;
                case 'int':
                    $typeRule = $this->getIntTypeRule($key, $field, $gridIndex);
                    break;
                case 'date':
                    $typeRule = $this->getDateTypeRule($key, $field, $gridIndex);
                    break;
                case 'datetime':
                    $typeRule = $this->getDateTimeTypeRule($key, $field, $gridIndex);
                    break;
                case 'time':
                    $typeRule = $this->getTimeTypeRule($key, $field, $gridIndex);
                    break;
                case 'select':
                    $typeRule = $this->getSelectTypeRule($key, $field, $gridIndex);
                    break;
                case 'array':
                    $typeRule = $this->getArrayTypeRule($key, $field, $gridIndex);
                    break;
                case 'file':
                    $typeRule = $this->getFileTypeRule($key, $field, $gridIndex);
                    break;
                case 'region':
                    $typeRule = $this->getRegionTypeRule($key, $field, $gridIndex);
                    break;
                case 'staff':
                    $typeRule = $this->getStaffTypeRule($key, $field, $gridIndex);
                    break;
                case 'department':
                    $typeRule = $this->getDepartmentTypeRule($key, $field, $gridIndex);
                    break;
                case 'shop':
                    $typeRule = $this->getShopTypeRule($key, $field, $gridIndex);
                    break;
                case 'api':
                    $typeRule = $this->getApiTypeRule($key, $field, $gridIndex);
                    break;
                default:
                    $typeRule = [];
            }
            $rule = array_collapse([$rule, $typeRule]);
        }
        return $rule;
    }
}