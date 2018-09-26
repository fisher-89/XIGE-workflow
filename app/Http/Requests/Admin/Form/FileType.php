<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13/013
 * Time: 15:36
 */

namespace App\Http\Requests\Admin\Form;


use Illuminate\Validation\Rule;

trait FileType
{
    protected $key;
    protected $gridIndex;

    protected function getFileTypeRule($key, $field, $gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $fileRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'nullable',
                'numeric',
            ],
            'fields.' . $key . '.max' => [
                'nullable',
                'numeric',
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                'string'
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];

        //控件字段
        if(!is_null($this->gridIndex)){
            $gridFileRule = [];
            foreach($fileRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridFileRule[$k] = $v;
            }
            $fileRule = $gridFileRule;
        }
        $this->fileMessage();
        return $fileRule;
    }

    protected function fileMessage()
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