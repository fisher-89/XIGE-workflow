<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25/025
 * Time: 13:55
 */

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class FieldsService
{

    /*--------------------------------start------------------------------------*/

    /**
     * 获取表单data数据
     * @param $formId
     * @param $runId
     */
    public function getFormData($flowModel, $runId = 0)
    {
        $data = [];
        $formFieldsData = [];
        $gridFieldsData = [];
        if ($runId) {
            //获取表单字段数据
            $tableName = 'form_data_' . $flowModel->form_id;
            $formFieldsData = DB::table($tableName)->whereRunId($runId)->first();
            $formFieldsData = json_decode(json_encode($formFieldsData), true);

            //获取控件字段数据
            $gridData = $flowModel->form->grid;
            if ($gridData) {
                foreach ($gridData as $v) {
                    $gridTableName = 'form_data_' . $flowModel->form_id . '_' . $v['key'];
                    $gridData = DB::table($gridTableName)->where(['run_id' => $runId, 'data_id' => $formFieldsData['id']])->get();
                    $gridData = json_decode(json_encode($gridData), true);
                    $gridFieldsData[$v['key']] = $gridData;
                }
            }
        }
        $data['form'] = $formFieldsData;
        $data['grid'] = $gridFieldsData;
        return $data;
    }

    /**
     *获取初始表单字段数据或提交的表单字段数据
     * @param $flowModel
     * @param $stepModel
     * @param array $formData
     */
    public function getRequestFormData($flowModel, $formData = [])
    {
        if (empty($formData)) {//开始发起获取字段数据
            $fields = $this->getFields($flowModel);//获取表单字段与控件字段数据
//            $formFieldsData = $this->exceptHiddenFields($fields, $stepModel->hidden_fields);//去除隐藏的字段
        } else {
            //TODO 处理提交的表单数据
        }
        return $fields;
    }

    /**
     * 解析默认值变量并处理数据
     * @param $requestFormFieldsData
     * @param $dbFormFieldsData
     */
    public function analysisDefaultValue($requestFormFieldsData, $dbFormFieldsData, $stepModel)
    {
        if (empty($dbFormFieldsData['form']) && empty($dbFormFieldsData['grid'])) {
            //表单data无数据  开始发起
            $fields = $this->analysisFields($requestFormFieldsData);
            $fields = $this->exceptHiddenFields($fields, $stepModel->hidden_fields);//去除隐藏的字段
        } else {
            // TODO 表单data有数据数据
        }
        return $fields;
    }

    /**
     * 解析表单字段与控件字段
     * @param $fields
     * @return mixed
     */
    protected function analysisFields($fields)
    {
        $fields['form'] = $fields['form']->map(function ($field) use ($fields) {
            $field->default_value = $field->default_value ? $this->analysisDefaultValueVariate($field->default_value, $fields['form']) : $field->default_value;
            return $field;
        });
        $fields['grid'] = $fields['grid'] ? $this->analysisGrid($fields['grid']) : $fields['grid'];
        return $fields;
    }

    /**
     * 解析控件字段值
     * @param $gridModel
     * @return mixed
     */
    protected function analysisGrid($gridModel)
    {
        foreach ($gridModel as $k => $grid) {
            foreach ($grid['fields'] as $key => $field) {
                $field->default_value = $field->default_value ? $this->analysisDefaultValueVariate($field->default_value, $grid['fields']) : $field->default_value;
                $gridModel[$k]['fields'][$key] = $field;
            }
        }
        return $gridModel;
    }

    /**
     * 解析默认值变量
     * 系统变量、计算变量、字段变量
     * @param $defaultValue
     */
    public function analysisDefaultValueVariate($defaultValue, $formFieldsModel)
    {
        $value = $this->systemVariate($defaultValue);//系统变量解析
        $value = $this->formFieldsVariate($value, $formFieldsModel);//解析字段变量
        $value = $this->calculation($value);//解析运算公式
        return $value;
    }

    /**
     * 解析默认值系统变量
     * @param $defaultValue
     * @return null|string|string[]
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    protected function systemVariate($defaultValue)
    {
        $variate = app('defaultValueVariate')->get();
        $value = preg_replace_callback('/{{(\w+)}}/', function ($matches) use ($variate) {
            if (array_has($variate, $matches[1])) {
                $response = '';
                eval('$response = ' . $variate[$matches[1]]['code'] . ';');
                return $response;
            } else {
                return $matches[0];
            }
        }, $defaultValue);
        return $value;
    }

    /**
     * 解析表单字段变量
     * @param $defaultValue
     * @param $formFieldsModel
     */
    protected function formFieldsVariate($defaultValue, $formFieldsModel)
    {
        $value = $defaultValue;
        $formFieldsData = $formFieldsModel->keyBy('key')->toArray();
        if (preg_match('/{\?(\w+)\?}/', $defaultValue)) {
            $value = preg_replace_callback('/{\?(\w+)\?}/', function ($matches) use ($formFieldsData) {
                if (array_has($formFieldsData, $matches[1])) {
                    $response = $formFieldsData[$matches[1]]['default_value'];
                    return $response;
                }
                return $matches[1];
            }, $defaultValue);
        }
        return $value;
    }


    /**
     * 解析默认值运算符号变量
     * @param $defaultValue
     */
    protected function calculation($defaultValue)
    {
        $calculations = app('defaultValueCalculation')->get();
        $lastCalculation = '';
        $value = preg_replace_callback('/(.*?)({<(\d+)>}|$)/', function ($matches) use ($calculations, &$lastCalculation) {
            if (array_has($matches, 3) && array_has($calculations, $matches[3])) {
                $calculation = $calculations[$matches[3]]['code'];
                $text = ($calculation == '(' && !empty($matches[1])) ? '\'' . $matches[1] . '\'.' : $this->decorateText($matches[1]);
            } else {
                $calculation = '';
                $text = $this->decorateText($matches[0]);
            }
            if ($lastCalculation == ')' && !empty($text)) {
                $text = '.' . (preg_match('/^\'/', $text) == 0 ? "'$text'" : $text);
            }
            $lastCalculation = $calculation;
            return $text . $calculation;
        }, $defaultValue);
        eval('$value = ' . $value . ';');
        return $value;
    }

    protected function decorateText($text)
    {
        return (is_numeric($text) || empty($text)) ? $text : "'$text'";
    }

    /**
     * 获取表单字段与控件字段数据
     * @param $flowModel
     */
    public function getFields($flowModel)
    {
        $field = [];
        $field['form'] = $this->getFormFields($flowModel->form->fields);
        $field['grid'] = $flowModel->form->grid->load('fields');
        return $field;
    }

    /**
     * 获取表单字段
     * @param $fieldModel
     * @return mixed
     */
    protected function getFormFields($fieldModel)
    {
        return $fieldModel->filter(function ($field) {
            return $field->form_grid_id == null;
        })->pluck([]);
    }

    /**
     * 获取去除了隐藏字段的
     * 表单字段与控件字段
     * @param $fields
     * @param $hiddenFields
     */
    protected function exceptHiddenFields($fields, $hiddenFields)
    {
        $fields['form'] = $this->getFormFieldsExceptHiddenFields($fields['form'], $hiddenFields);
        $fields['grid'] = $this->getGridFieldsExceptHiddenFields($fields['grid'], $hiddenFields);
        return $fields;
    }

    /**
     * 去除表单字段的hidden字段
     * @param $formField
     * @param $hiddenFields
     * @return mixed
     */
    protected function getFormFieldsExceptHiddenFields($formFieldModel, $hiddenFields)
    {
        $formField = $formFieldModel->filter(function ($field) use ($hiddenFields) {
            return !in_array($field->key, $hiddenFields);
        })->pluck([]);
        return $formField;
    }

    /**
     * 去除控件字段的hidden字段
     * @param $gridModel
     * @param $hiddenFields
     * @return array
     */
    protected function getGridFieldsExceptHiddenFields($gridModel, $hiddenFields)
    {
        $gridData = [];
        foreach ($gridModel as $grid) {
            $gridHiddenFields = [];
            $pregExp = '/' . $grid->key . '\.\*\./';
            foreach ($hiddenFields as $hiddenField) {
                if (preg_match($pregExp, $hiddenField)) {
                    $gridHiddenFields[] = preg_replace($pregExp, '', $hiddenField);
                }
            }
            $originalData = $grid->toArray();
            $originalData['fields'] = $grid->fields->whereNotIn('key', $gridHiddenFields)->pluck([]);
            $gridData[] = $originalData;
        }
        return $gridData;
    }


    /*--------------------------------end------------------------------------*/

}