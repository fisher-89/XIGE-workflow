<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
//    Route::get('list', 'ResourceController@getFlowList');//获取可发起的流程
    Route::get('start/{flow}', 'ResourceController@start');//获取流程发起数据
    Route::get('fields/{flow}','ResourceController@getFields');//获取表单字段与控件字段
    Route::post('preset/{flow}', 'ActionController@preset');//流程预提交处理


    Route::post('start', 'ActionController@start');//流程发起处理
    Route::get('step-data/{flow_id}','ActionController@getCurrentUserStepData');//获取该流程的当前人的步骤数据
    Route::post('through','ActionController@through');//流程步骤通过处理
});