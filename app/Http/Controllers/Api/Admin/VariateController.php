<?php

namespace App\Http\Controllers\Api\Admin;


use App\Services\DefaultValueCalculationService;
use App\Services\DefaultValueVariateService;
use App\Services\ResponseService;
use App\Http\Controllers\Controller;

class VariateController extends Controller
{

    protected $variate;
    protected $calculation;

    public function __construct(DefaultValueVariateService $defaultValueVariateService, DefaultValueCalculationService $defaultValueCalculationService)
    {
        $this->variate = $defaultValueVariateService;
        $this->calculation = $defaultValueCalculationService;
    }

    /**
     * 获取默认值变量与计算公式数据
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function index(ResponseService $responseService)
    {
        $data = [
            'variate' => array_values($this->variate->get()),
            'calculation' => array_values($this->calculation->get()),
        ];
        return $responseService->get($data);
    }
}
