<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6/006
 * Time: 9:32
 * 地区
 */

namespace App\Repository;


use App\Models\Region;
use Illuminate\Support\Facades\Cache;

class RegionRepository
{
    /**
     * 获取地区缓存
     * @return mixed
     */
    public function getCacheRegion()
    {
        $region = Cache::rememberForever('region',function(){
            return $this->setRegion();
        });
        return $region;
    }

    /**
     * 清除地区缓存
     */
    public function forgetCacheRegion(){
        return Cache::forget('region');
    }
    protected function setRegion()
    {
        $region = $this->getRegion();
        $all = $region->toArray();
        $province = $this->getProvince($region);
        $city = $this->getCity($region);
        $county = $this->getCounty($region);
        return [
          'region'=>$all,
          'province'=>$province,
          'city'=>$city,
          'county'=>$county,
        ];
    }

    /**
     * 获取省
     * @return mixed
     */
    protected function getProvince($region)
    {
        $province = $region->filter(function($value){
            return $value->level == 1;
        })->toArray();
        return $province;
    }

    /**
     * 获取市
     * @return mixed
     */
    protected function getCity($region)
    {
        $city = $region->filter(function($value){
            return $value->level == 2;
        })->toArray();
        return $city;
    }

    /**
     * 获取区
     * @return mixed
     */
    protected function getCounty($region)
    {
        $county = $region->filter(function($value){
            return $value->level == 3;
        })->toArray();
        return $county;
    }

    protected function getRegion()
    {
        return Region::get();
    }
}