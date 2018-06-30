<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9/009
 * Time: 13:52
 */

namespace App\Observers;



class TypeObserver
{
    public function created($model){
        $this->deleteRedisKey($model);
    }

    public function saved($model){
        $this->deleteRedisKey($model);
    }

    public function deleted($model){
        $this->deleteRedisKey($model);
    }

    /**
     * 删除缓存
     * @param $model
     */
    protected function deleteRedisKey($model){
        if(cache()->has($model->getTable()))
            cache()->forget($model->getTable());
    }
}