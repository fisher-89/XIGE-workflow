<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\DefaultValueCalculation;
use App\Models\DefaultValueVariate;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariateController extends Controller
{
    /**
     * 获取默认值变量与计算公式数据
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function index(ResponseService $responseService){
        $variateData = DefaultValueVariate::get()->toArray();
        $calculationData = DefaultValueCalculation::get()->toArray();
        $data =[
            'variate'=>$variateData,
            'calculation'=>$calculationData
        ];
        return $responseService->get($data);
    }
}
