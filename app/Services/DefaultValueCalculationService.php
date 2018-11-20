<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26/026
 * Time: 14:16
 */

namespace App\Services;


use App\Models\DefaultValueCalculation;
use Illuminate\Support\Facades\Cache;

class DefaultValueCalculationService
{
    /**
     *获取默认值的计算数据
     */
    public function get(){
        $data = Cache::rememberForever('calculation',function(){
           return  DefaultValueCalculation::get()->keyBy('id')->toArray();
        });
        return  $data;
    }

    /**
     * 清楚计算公式数据缓存
     */
    public function clear(){
        return Cache::forget('calculation');
    }

}