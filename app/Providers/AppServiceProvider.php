<?php

namespace App\Providers;

use App\Services\Web\ActionService;
use App\Services\DefaultValueCalculationService;
use App\Services\DefaultValueVariateService;
use App\Services\Web\FormDataService;
use App\Services\Web\PresetService;
use App\Services\ResponseService;
use App\Services\Web\StartService;
use App\Services\Web\ThroughService;
use App\Services\Web\ValidationService;
use App\Services\Web\WithdrawService;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('not_in_array', function ($attribute, $value, $parameters, $validator) {
            $attributeGroup = explode('.', $attribute);
            $parameterGroup = explode('.', $parameters[0]);
            $newParameter = '';
            foreach ($parameterGroup as $index => $item) {
                $newParameter .= ($item == '*' && is_numeric($attributeGroup[$index])) ? $attributeGroup[$index] : $item;
                $newParameter .= '.';
            }
            $newParameter = trim($newParameter,'.');
            $array = array_get($validator->getData(),$newParameter);
            return !in_array($value,$array);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apiResponse',ResponseService::class);//response返回
        //前台
        $this->app->singleton('validation', ValidationService::class);
        $this->app->singleton('formData',FormDataService::class);
        $this->app->singleton('defaultValueVariate',DefaultValueVariateService::class);
        $this->app->singleton('defaultValueCalculation',DefaultValueCalculationService::class);
        $this->app->singleton('preset',PresetService::class);
        $this->app->singleton('start',StartService::class);//发起服务
        $this->app->singleton('withdraw',WithdrawService::class);//撤回
        $this->app->singleton('through',ThroughService::class);//通过
    }
}
