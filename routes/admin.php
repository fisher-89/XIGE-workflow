<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30/030
 * Time: 9:38
 */
Route::namespace('Api\Admin')->middleware('auth:api')->group(function () {
    Route::pattern('id', '[0-9]+');//验证id
    //表单分类
    Route::apiResource('form-type', 'FormTypeController')->parameter('form-type', 'id');
    //流程分类
    Route::apiResource('flow-type', 'FlowTypeController')->parameter('flow-type', 'id');
    //验证规则
    Route::apiResource('validator', 'ValidatorController')->parameter('validator', 'id');

    //表单
    Route::apiResource('form', 'FormController')->parameter('form', 'id');

    //旧表单获取
    Route::get('form-old/{id}', 'FormController@getOldForm');

    // 获取表单列表（不带权限）
    Route::get('form-list', 'FormController@getFormList');

    //字段接口配置
    Route::apiResource('field-api-configuration', 'FieldApiConfigurationController', [
        'only' => ['index', 'store', 'update', 'destroy', 'show']
    ])->parameter('field-api-configuration', 'id');
    //检查OA接口地址测试
    Route::post('check-oa-api', 'FieldApiConfigurationController@checkOaApi');
    //获取接口配置oa接口数据
    Route::get('get-oa-api/{id}', 'FieldApiConfigurationController@getOaApi');

    //流程
    Route::apiResource('flow', 'FlowController')->parameter('flow', 'id');

    //流程图标
    Route::post('flow-icon', 'FlowController@uploadIcon');
    //流程克隆
    Route::post('flow-clone', 'FlowController@flowClone');

    //旧流程获取
    Route::get('flow-old/{id}', 'FlowController@getOldFlow');

    // 获取流程列表（不带权限）
    Route::get('flow-list', 'FlowController@getFlowList');

    //步骤审批配置
    Route::apiResource('step-approver', 'StepApproverController')->parameter('step-approver', 'id');
    //步骤部门审批配置
    Route::apiResource('step-department-approver', 'StepDepartmentApproverController', [
        'parameters' => [
            'step-department-approver' => 'id'
        ]
    ]);

    Route::get('variate-calculation', 'VariateController@index');//获取默认值的变量数据与计算公式数据
    /**
     * 流程运行
     */
    Route::prefix('flow-run')->group(function () {
        //通过流程number获取表单数据（包含旧的）
        Route::get('/form/flow/{number}', 'FlowRunController@getFlowForm');

        //通过表单number获取表单数据（包含旧的）
        Route::get('/form/{number}', 'FlowRunController@getForm');

        //获取列表
        Route::get('/', 'FlowRunController@index');
        /*-----导出-----*/
        Route::get('/export/start', 'FlowRunController@startExport');
        Route::get('/export/get', 'FlowRunController@getExport');
        Route::get('/export/download', 'FlowRunController@downloadExport');
        /*-----导出-----*/
    });

    //待办通知
    Route::apiResource('todo', 'Todo\TodoController', [
        'only' => ['index', 'update'],
    ])->parameter('todo', 'id');

    //工作通知
    Route::apiResource('job', 'Job\JobController', [
        'only' => ['index', 'update'],
    ])->parameter('job', 'id');

    //权限
    Route::prefix('auth')->namespace('Auth')->group(function () {
        // 角色
        Route::apiResource('role', 'RoleController')->parameter('role', 'id');
        // 获取超级管理员
        Route::get('super','RoleController@getSuper');
    });
});

//测试导出
//Route::get('flow-run/export/start','Api\Admin\FlowRunController@startExport');
//Route::get('flow-run/export/get','Api\Admin\FlowRunController@getExport');
//Route::get('flow-run/export/download','Api\Admin\FlowRunController@downloadExport');
