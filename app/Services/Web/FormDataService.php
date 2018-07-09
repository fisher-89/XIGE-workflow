<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/12/012
 * Time: 16:21
 */

namespace App\Services\Web;



class FormDataService
{

    /*----------------------------------------------------*/

    /**
     * 获取过滤的表单data数据 进行填充默认值
     * @param $formData
     * @param $field
     */
    public function getFilterFormData(array $formData, $fields)
    {
        $newFormData = $fields['form']->map(function ($field) use ($formData) {
            $response[$field->key] = !empty($formData[$field->key]) ? $formData[$field->key] : (!empty($field->default_value) ? $this->analysisDefaultValueVariate($field->default_value, $formData) : '');
            return $response;
        });
        $newFormData = array_collapse($newFormData->toArray());

        //控件字段过滤
        if (count($fields['grid']) > 0) {
            $gridData = $this->filterFormGridData($fields['grid'], $formData);
            $newFormData = array_collapse([$newFormData, $gridData]);
        }
        return $newFormData;
    }

    /**
     * 筛选控件与填充默认值
     * @param $grid
     * @param $formData
     */
    protected function filterFormGridData($grid, array $formData)
    {
        $gridData = [];
        foreach ($grid as $gridKey => $gridItem) {
            $gridItemData = [];
            foreach ($gridItem['fields'] as $fieldKey => $fieldItem) {
                if (array_has($formData, $gridItem['key']) && $formData[$gridItem['key']]) {
                    //表单data有数据
                    foreach ($formData[$gridItem['key']] as $formKey => $formValue) {
                        if (empty($formValue[$fieldItem['key']])) {
                            $value = !empty($fieldItem['default_value']) ? $this->analysisDefaultValueVariate($fieldItem['default_value'], $formValue) : '';
                        } else {
                            $value = $formValue[$fieldItem['key']];
                        }
                        $gridItemData[$formKey][$fieldItem['key']] = $value;
                        if (array_has($formValue, 'id')) {
                            $gridItemData[$formKey]['id'] = $formValue['id'];
                        }
                    }
                }
            }
            $gridData[$gridItem['key']] = $gridItemData;
        }
        return $gridData;
    }

    /**
     * 解析默认值变量
     * 系统变量、计算变量、字段变量
     * @param $defaultValue
     * @param $formData
     */
    public function analysisDefaultValueVariate($defaultValue, array $formData)
    {
        $value = $this->systemVariate($defaultValue);//系统变量解析
        if (!empty($formData)) {
            $value = $this->formFieldsVariate($value, $formData);//解析字段变量
            $value = $this->calculation($value);//解析运算公式
        } else {
            if (preg_match('/{\?(\w+)\?}/', $value))
                $value = '';
        }
        return $value;
    }

    /**
     * 解析默认值系统变量
     * @param $defaultValue
     * @return null|string|string[]
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function systemVariate($defaultValue)
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
    public function formFieldsVariate($defaultValue, array $formData)
    {
        $value = $defaultValue;
        if (preg_match('/{\?(\w+)\?}/', $defaultValue)) {
            $value = preg_replace_callback('/{\?(\w+)\?}/', function ($matches) use ($formData) {
                if (array_has($formData, $matches[1])) {
                    $response = $formData[$matches[1]];
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
    public function calculation($defaultValue)
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
        if (preg_match('/{\?.*\?}/', $value, $reg) || preg_match('/{<(\d+)>}/', $value, $reg) || preg_match('/{{(\w+)}}/', $value, $reg))
            abort(400, $reg[0] . '配置错误,请联系管理员');
        eval('$value = ' . $value . ';');
        return $value;
    }

    protected function decorateText($text)
    {
        return (is_numeric($text) || empty($text)) ? $text : "'$text'";
    }
}