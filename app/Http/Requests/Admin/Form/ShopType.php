<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13/013
 * Time: 16:11
 */

namespace App\Http\Requests\Admin\Form;

use App\Rules\Admin\Form\WidgetField;
use Illuminate\Validation\Rule;

trait ShopType
{
    protected $key;
    protected $gridIndex;

    protected function getShopTypeRule($key, $field, $gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $shopRule = [
            'fields.' . $key . '.region_level' => [
                'nullable',
                Rule::notIn([1, 2, 3, 4]),
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'nullable',
                'numeric',
                'min:'.(($field['is_checkbox']==1 && $field['min']<1) ? 1 : $field['min']),
                'max:'.($field['max']?:9999999)
            ],
            'fields.' . $key . '.max' => [
                'nullable',
                'numeric',
                'min:'.($field['min']?:0)
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                'array',
                new WidgetField($field)
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];

        //控件字段
        if(!is_null($this->gridIndex)){
            $gridShopRule = [];
            foreach($shopRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridShopRule[$k] = $v;
            }
            $shopRule = $gridShopRule;
        }
        $this->shopMessage();
        return $shopRule;
    }

    protected function shopMessage()
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