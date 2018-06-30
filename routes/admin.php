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
});