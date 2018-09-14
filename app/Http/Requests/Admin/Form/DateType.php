<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11/011
 * Time: 17:42
 */

namespace App\Http\Requests\Admin\Form;


use App\Rules\Admin\Form\DateField;
use Illuminate\Validation\Rule;

trait DateType
{
    protected $key;
    protected $gridIndex;

    protected function getDateTypeRule($key,$field,$gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $dateRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'date_format:Y-m-d',
                'before_or_equal:' . ($field['max'] ?: '9999-12-31')
            ],
            'fields.' . $key . '.max' => [
                'date_format:Y-m-d',
                'after_or_equal:' . ($field['min'] ?: '1900-01-01')
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
            $gridDateRule = [];
            foreach($dateRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridDateRule[$k] = $v;
            }
            $dateRule = $gridDateRule;
        }

        $this->dateMessage();
        return $dateRule;
    }

    protected function dateMessage()
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