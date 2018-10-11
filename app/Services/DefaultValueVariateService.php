<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25/025
 * Time: 14:26
 */

namespace App\Services;


use App\Models\DefaultValueVariate;
use Illuminate\Support\Facades\Cache;

class DefaultValueVariateService
{

    /**
     * 获取默认值的所有变量
     * @return \Illuminate\Contracts\Cache\Repository
     * @throws \Exception
     */
    public function get(){
        $variate = Cache::rememberForever('variate',function(){
            $data =  DefaultValueVariate::get()->keyBy('key')->toArray();
            return $data;
        });
        return $variate;
    }

    /**
     * 清楚变量缓存
     */
    public function clearVariateCache(){
        Cache::forget('variate');
    }
}