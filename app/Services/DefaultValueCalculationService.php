<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26/026
 * Time: 14:16
 */

namespace App\Services;


use App\Models\DefaultValueCalculation;

class DefaultValueCalculationService
{
    /**
     *获取默认值的计算数据
     */
    public function get(){
        $data = cache()->get('calculation',function(){
           return $this->setCalculationToCache();
        });
        return  $data;
    }

    /**
     * 清楚计算公式数据缓存
     */
    public function clearCalculationCache(){
        cache()->forget('calculation');
    }

    /**
     * 添加计算公式数据到缓存
     */
    public function setCalculationToCache(){
        $data = DefaultValueCalculation::get()->keyBy('id')->toArray();
        cache()->forever('calculation',$data);
        return $data;
    }
}