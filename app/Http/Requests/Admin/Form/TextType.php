<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11/011
 * Time: 10:25
 */

namespace App\Http\Requests\Admin\Form;


use Illuminate\Validation\Rule;

trait TextType
{
    protected $key;
    protected $gridIndex;

    protected function getTextTypeRule($key, $field,$gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;

        $textRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'numeric',
                'max:' . ($field['max'] ?: 9999999)
            ],
            'fields.' . $key . '.max' => [
                'numeric',
                'min:' . ($field['min'] ?: 0)
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                'nullable',
                'between:'.($field['min']?:0).','.($field['max']?:9999999)
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];
        //去除默认值含有运算符号、系统变量、字段类型的验证
        $regex = '/(({<(\d+)>})|({{(\w+)}})|({\?(\w+)\?}))/';
        if($field['default_value'] && preg_match($regex,$field['default_value'])){
            $intRule['fields.' . $this->key . '.default_value'] = 'string';
        }
        //控件字段
        if(!is_null($this->gridIndex)){
            $gridTextRule = [];
            foreach($textRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridTextRule[$k] = $v;
            }
            $textRule = $gridTextRule;
        }
        $this->textMessage();
        return $textRule;
    }

    protected function textMessage()
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