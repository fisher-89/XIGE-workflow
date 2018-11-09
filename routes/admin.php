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
    Route::apiResource('form-type', 'FormTypeController')->parameter('form-type','id');
    //流程分类
    Route::apiResource('flow-type', 'FlowTypeController')->parameter('flow-type','id');
    //验证规则
    Route::apiResource('validator', 'ValidatorController')->parameter('validator','id');
    //表单
    Route::apiResource('form', 'FormController')->parameter('form', 'id');

    //旧表单获取
    Route::get('form-old/{id}','FormController@getOldForm');

    //字段接口配置
    Route::apiResource('field-api-configuration','FieldApiConfigurationController',[
        'only'=>['index','store','update','destroy','show']
    ])->parameter('field_api_configuration','id');
    //检查OA接口地址测试
    Route::post('check-oa-api','FieldApiConfigurationController@checkOaApi');
    //获取接口配置oa接口数据
    Route::get('get-oa-api/{id}','FieldApiConfigurationController@getOaApi');

    //流程
    Route::apiResource('flow', 'FlowController')->parameter('flow', 'id');

    //流程克隆
    Route::post('flow-clone','FlowController@flowClone');

    //旧流程获取
    Route::get('flow-old/{id}','FlowController@getOldFlow');

    //步骤审批配置
    Route::apiResource('step-approver','StepApproverController');
    //步骤部门审批配置
    Route::apiResource('step-department-approver','StepDepartmentApproverController');

    Route::get('variate-calculation','VariateController@index');//获取默认值的变量数据与计算公式数据
    /**
     * 流程运行
     */
    Route::prefix('flow-run')->group(function(){
        //获取流程的表单
        Route::get('/form/{flow_id}','FlowRunController@getForm');
        //获取列表
        Route::get('/','FlowRunController@index');
        //获取导出数据
        Route::get('/get-export','FlowRunController@getExport');
    });

    //待办通知
    Route::apiResource('todo','Todo\TodoController',[
        'only'=>['index','update'],
    ])->parameter('todo','id');

    //工作通知
    Route::apiResource('job','Job\JobController',[
        'only'=>['index','update'],
    ])->parameter('job','id');
});