<?php

namespace App\Providers;

use App\Models\FlowType;
use App\Models\FormType;
use App\Observers\TypeObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'App\Events\Event' => [
//            'App\Listeners\EventListener',
//        ],
        //角色修改事件
        'App\Events\RoleUpdateEvent' => [],
        //角色新增事件
        'App\Events\RoleAddEvent' => [],
        //角色删除事件
        'App\Events\RoleDeleteEvent' => [],

        /**
         * 后台流程事件
         */

        //修改
        'App\Events\FlowUpdateEvent'=>[],
        //新增
        'App\Events\FlowAddEvent'=>[],
        //删除
        'App\Events\FlowDeleteEvent' =>[],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        FormType::observe(TypeObserver::class);//表单分类缓存处理
        FlowType::observe(TypeObserver::class);//流程分类缓存处理
        //
    }
}
