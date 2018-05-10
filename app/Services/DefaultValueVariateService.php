<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25/025
 * Time: 14:26
 */

namespace App\Services;


use App\Models\DefaultValueVariate;

class DefaultValueVariateService
{

    /**
     * 获取默认值的所有变量
     * @return \Illuminate\Contracts\Cache\Repository
     * @throws \Exception
     */
    public function get(){
        $variate = cache()->get('variate',function(){
           return $this->setVariateToCache();
        });
        return $variate;
    }

    /**
     * 清楚变量缓存
     */
    public function clearVariateCache(){
        cache()->forget('variate');
    }

    /**
     * 默认值变量添加到缓存
     */
    public function setVariateToCache(){
       $data =  DefaultValueVariate::get()->keyBy('key')->toArray();
       cache()->forever('variate',$data);
       return $data;
    }



}