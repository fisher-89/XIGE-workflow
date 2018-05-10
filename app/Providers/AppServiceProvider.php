<?php

namespace App\Providers;

use App\Services\ActionService;
use App\Services\DefaultValueCalculationService;
use App\Services\DefaultValueVariateService;
use App\Services\FieldsService;
use App\Services\FlowRunService;
use App\Services\FormDataService;
use App\Services\StepRunService;
use App\Services\StepService;
use App\Services\ValidationService;
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
        $this->app->singleton('validation', ValidationService::class);
        $this->app->singleton('flowRun',FlowRunService::class);
        $this->app->singleton('step',StepService::class);
        $this->app->singleton('formData',FormDataService::class);
        $this->app->singleton('stepRun',StepRunService::class);
        $this->app->singleton('action',ActionService::class);
        $this->app->singleton('field',FieldsService::class);
        $this->app->singleton('defaultValueVariate',DefaultValueVariateService::class);
        $this->app->singleton('defaultValueCalculation',DefaultValueCalculationService::class);
    }
}
