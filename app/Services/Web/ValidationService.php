<?php
/**
 * Created by PhpStorm.
 * User: Fisher
 * Date: 2018/4/7 0007
 * Time: 21:04
 */

namespace App\Services\Web;


use Illuminate\Validation\Rule;

class ValidationService
{
    /**
     * 生成步骤的表单验证规则
     *
     * @param $step
     *
     * @return array
     */
    public function makeStepFormValidationRules($step)
    {
        $fields = $step->flow->form->fields;
        $editableFields = $step->editable_fields;
        $requiredFields = $step->required_fields;
        $rules = [];
        $fields->each(function ($field) use (&$rules, $editableFields, $requiredFields) {
            //字段key
            $key = $field->grid ? $field->grid->key . '.*.' . $field->key : $field->key;
            if (in_array($key, $editableFields)) {
                $fieldRules = $field->validator->map(function ($validator) {
                    return $validator->type . ($validator->params ? ':' . $validator->params : '');
                })->toArray();

                switch ($field->type) {
                    case 'int':
                        if ($field->scale == 0) {
                            $fieldRules[] = 'integer';
                        } else if ($field->scale > 0) {
                            $fieldRules[] = 'numeric';
                        }
                        break;
                    case 'text':
                        $fieldRules[] = 'string';
                        break;
                    case 'file':
                        $fieldRules[] = 'array';
                        break;
                    case 'select':
                        $rules['form_data.' . $key . '.*'] = $fieldRules;
                        $fieldRules = ['array'];
                        break;
                    case 'array':
                        $rules['form_data.' . $key . '.*'] = $fieldRules;
                        $fieldRules = ['array'];
                        break;
                    case 'date':
                        $fieldRules[] = 'date_format:"Y-m-d"';
                        break;
                    case 'datetime':
                        $fieldRules[] = 'date_format:"Y-m-d H:i:s"';
                        break;
                    case 'time':
                        $fieldRules[] = 'date_format:"H:i:s"';
                        break;
                    case 'region':
                        $region = request()->get('form_data')[$key];
                        $rules['form_data.' . $key . '.province_id'] = [
                            'nullable',
                            Rule::exists('region', 'id')->where('level', 1)
                        ];
                        $rules['form_data.' . $key . '.city_id'] = [
                            'nullable',
                            Rule::exists('region', 'id')->where('parent_id', ($region['province_id'] ?? 2))
                        ];
                        $rules['form_data.' . $key . '.county_id'] = [
                            'nullable',
                            Rule::exists('region', 'id')->where('parent_id', ($region['city_id'] ?? 3))
                        ];
                        $rules['form_data.' . $key . '.address'] = [
                            'nullable',
                            'string'
                        ];
                        $fieldRules[] = 'array';
                        break;
                    case 'staff':
                        if (count($field->widgets) > 0) {
                            $staffSns = $field->widgets->pluck('value')->all();
                            if ($field->is_checkbox == 0) {
                                $rules['form_data.' . $key . '.value'] = 'in:' . implode(',', $staffSns);
                            } else {
                                $rules['form_data.' . $key . '.*.value'] = 'in:' . implode(',', $staffSns);
                            }
                        }
                        $fieldRules[] = 'array';
                        break;
                    case 'department':
                        if (count($field->widgets) > 0) {
                            $departmentIds = $field->widgets->pluck('value')->all();
                            if ($field->is_checkbox == 0) {
                                $rules['form_data.' . $key . '.value'] = 'in:' . implode(',', $departmentIds);
                            } else {
                                $rules['form_data.' . $key . '.*.value'] = 'in:' . implode(',', $departmentIds);
                            }
                        }
                        $fieldRules[] = 'array';
                        break;
                    case 'shop':
                        if (count($field->widgets) > 0) {
                            $shopIds = $field->widgets->pluck('value')->all();
                            if ($field->is_checkbox == 0) {
                                $rules['form_data.' . $key . '.value'] = 'in:' . implode(',', $shopIds);
                            } else {
                                $rules['form_data.' . $key . '.*.value'] = 'in:' . implode(',', $shopIds);
                            }
                        }
                        $fieldRules[] = 'array';
                        break;
                }

                $this->pushMinAndMaxRules($fieldRules, $field);
                if (in_array($key, $requiredFields)) {
                    $fieldRules[] = 'required';
                    if (strpos($key, '.*.')) {
                        $rules['form_data.' . $field->grid->key] = 'required';
                    }
                }
                $rules['form_data.' . $key] = $fieldRules;
            }
        });
        return $rules;
    }

    protected function pushMinAndMaxRules(&$fieldRules, $field)
    {
        if (in_array($field->type, ['date', 'datetime', 'time'])) {
            if ($field->max) $fieldRules[] = 'before_or_equal:' . $field->max;
            if ($field->min) $fieldRules[] = 'after_or_equal:' . $field->min;
        } else {
            if ($field->max) $fieldRules[] = 'max:' . $field->max;
            if ($field->min) $fieldRules[] = 'min:' . $field->min;
        }
    }

}