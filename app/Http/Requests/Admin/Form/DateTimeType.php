<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13/013
 * Time: 10:30
 */

namespace App\Http\Requests\Admin\Form;

use App\Rules\Admin\Form\DateField;
use Illuminate\Validation\Rule;

trait DateTimeType
{
    protected $key;
    protected $gridIndex;

    protected function getDateTimeTypeRule($key,$field,$gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $dateTimeRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'date_format:Y-m-d H:i:s',
                'before_or_equal:' . ($field['max'] ?: '9999-12-31 23:59:59')
            ],
            'fields.' . $key . '.max' => [
                'date_format:Y-m-d H:i:s',
                'after_or_equal:' . ($field['min'] ?: '1900-01-01 00:00:01')
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                new DateField($field)
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];

        //控件字段
        if(!is_null($this->gridIndex)){
            $gridDateTimeRule = [];
            foreach($dateTimeRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridDateTimeRule[$k] = $v;
            }
            $dateTimeRule = $gridDateTimeRule;
        }
        $this->dateTimeMessage();
        return $dateTimeRule;
    }

    protected function dateTimeMessage()
    {
        $message = [
            'fields.' . $this->key . '.region_level' => '地区级数',
            'fields.' . $this->key . '.min' => '最小值',
            'fields.' . $this->key . '.max' => '最大值',
            'fields.' . $this->key . '.scale' => '小数位数',
            'fields.' . $this->key . '.default_value' => '默认值',
            'fields.' . $this->key . '.options' => '可选值',
        ];
        //控件字段
        if(!is_null($this->gridIndex)){
            $gridMessage = [];
            foreach($message as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridMessage[$k] = $v;
            }
            $message = $gridMessage;
        }
        $this->msg = array_collapse([$this->msg, $message]);
    }
}