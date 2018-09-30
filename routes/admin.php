<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30/030
 * Time: 9:38
 */
Route::namespace('Api\Admin')->middleware('auth:api')->group(function(){
    Route::pattern('id', '[0-9]+');//验证id
    //表单分类
    Route::apiResource('form-type', 'FormTypeController');
    //流程分类
    Route::apiResource('flow-type', 'FlowTypeController');
    //验证规则
    Route::apiResource('validator', 'ValidatorController');
    //表单
    Route::apiResource('form', 'FormController')->parameter('form', 'id');
    //流程
    Route::apiResource('flow', 'FlowController')->parameter('flow', 'id');

    Route::get('variate-calculation','VariateController@index');//获取默认值的变量数据与计算公式数据
    //字段接口配置
    Route::apiResource('field-api-configuration','FieldApiConfigurationController',[
        'only'=>['index','store','update','destroy','show']
    ])->parameter('field_api_configuration','id');
    //检查OA接口地址测试
    Route::post('check-oa-api','FieldApiConfigurationController@checkOaApi');
    Route::get('get-oa-api/{id}','FieldApiConfigurationController@getOaApi');
});