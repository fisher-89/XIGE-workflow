<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13/013
 * Time: 14:37
 */

namespace App\Http\Requests\Admin\Form;

use App\Rules\Admin\Form\ArrayField;
use Illuminate\Validation\Rule;

trait ArrayType
{
    protected $key;
    protected $gridIndex;

    protected function getArrayTypeRule($key, $field, $gridIndex)
    {

        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $arrayRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'nullable',
                'numeric',
                'max:' . ($field['max'] ?: 9999999)
            ],
            'fields.' . $key . '.max' => [
                'nullable',
                'numeric',
                'min:' . ($field['min'] ?: 0)
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                'array',
                new ArrayField($field)
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];

        //控件字段
        if(!is_null($this->gridIndex)){
            $gridArrayRule = [];
            foreach($arrayRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridArrayRule[$k] = $v;
            }
            $arrayRule = $gridArrayRule;
        }
        $this->arrayMessage();
        return $arrayRule;
    }

    protected function arrayMessage()
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