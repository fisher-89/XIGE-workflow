<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13/013
 * Time: 14:54
 */

namespace App\Http\Requests\Admin\Form;


use Illuminate\Validation\Rule;

trait RegionType
{
    protected $key;
    protected $gridIndex;

    protected function getRegionTypeRule($key, $field, $gridIndex)
    {
        $this->key = $key;
        $this->gridIndex = $gridIndex;
        $regionRule = [
            'fields.' . $key . '.region_level' => [
                'required',
                Rule::in([1, 2, 3, 4])
            ],
            'fields.' . $key . '.min' => [
                'nullable',
            ],
            'fields.' . $key . '.max' => [
                'nullable',
            ],
            'fields.' . $key . '.scale' => [
                'required',
                'in:0'
            ],
            'fields.' . $key . '.default_value' => [
                'array',
            ],
            'fields.' . $key . '.default_value.province_id' => [
                Rule::exists('region','id')->where('level',1),
            ],
            'fields.' . $key . '.default_value.city_id' => [
                Rule::exists('region','id')->where('parent_id',$field['default_value']['province_id']),
            ],
            'fields.' . $key . '.default_value.county_id' => [
                Rule::exists('region','id')->where('parent_id',$field['default_value']['city_id']),
            ],
            'fields.' . $key . '.default_value.address' => [
                'string',
            ],
            'fields.' . $key . '.options' => [
                'array',
            ]
        ];

        //控件字段
        if(!is_null($this->gridIndex)){
            $gridRegionRule = [];
            foreach($regionRule as $k=>$v){
                $k = 'grids.'.$this->gridIndex.'.'.$k;
                $gridRegionRule[$k] = $v;
            }
            $regionRule = $gridRegionRule;
        }
        $this->regionMessage();
        return $regionRule;
    }

    protected function regionMessage()
    {
        $message = [
            'fields.' . $this->key . '.region_level' => '地区级数',
            'fields.' . $this->key . '.min' => '最小值',
            'fields.' . $this->key . '.max' => '最大值',
            'fields.' . $this->key . '.scale' => '小数位数',
            'fields.' . $this->key . '.default_value' => '默认值',
            'fields.' . $this->key . '.default_value.province_id' => '默认值 省',
            'fields.' . $this->key . '.default_value.city_id' => '默认值 省市',
            'fields.' . $this->key . '.default_value.county_id' => '默认值 省市区',
            'fields.' . $this->key . '.default_value.address' => '默认值 详细地址',
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