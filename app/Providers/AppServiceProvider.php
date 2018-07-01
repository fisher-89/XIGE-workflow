<?php

namespace App\Providers;

use App\Services\ActionService;
use App\Services\Admin\FormFieldsService;
use App\Services\Admin\FormService;
use App\Services\DefaultValueCalculationService;
use App\Services\DefaultValueVariateService;
use App\Services\FormDataService;
use App\Services\PresetService;
use App\Services\RejectService;
use App\Services\ResponseService;
use App\Services\StartService;
use App\Services\ThroughService;
use App\Services\ValidationService;
use App\Services\WithdrawService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apiResponse',ResponseService::class);//response返回
        $this->app->singleton('validation', ValidationService::class);
        $this->app->singleton('formData',FormDataService::class);
        $this->app->singleton('action',ActionService::class);
        $this->app->singleton('defaultValueVariate',DefaultValueVariateService::class);
        $this->app->singleton('defaultValueCalculation',DefaultValueCalculationService::class);
        $this->app->singleton('preset',PresetService::class);
        $this->app->singleton('start',StartService::class);//发起服务
        $this->app->singleton('withdraw',WithdrawService::class);//撤回
        $this->app->singleton('through',ThroughService::class);//通过
        $this->app->singleton('reject',RejectService::class);//驳回

        //后台
        $this->app->bind('formService',FormService::class);//表单
        $this->app->bind('FormFieldsService', FormFieldsService::class);//表单字段处理
    }
}
