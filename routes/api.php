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
    Route::get('list', 'ResourceController@getFlowList');//获取可发起的流程
    Route::get('start/{flow}', 'ResourceController@start');//获取发起数据
    Route::post('preset/{flow}', 'ActionController@preset');//预提交处理
    Route::post('start/{flow}', 'ActionController@start');//发起处理
    Route::post('approval','ResourceController@getApproval');//获取审批列表
    Route::get('approval/{stepRun}','ResourceController@getApprovalDetail');//获取审批详情
    Route::post('sponsor','ResourceController@getSponsor');//获取发起列表
    Route::get('sponsor/{flow_run_id}','ResourceController@getSponsorDetail');//获取发起详情
    Route::patch('withdraw','ActionController@withdraw');//撤回
    Route::patch('through','ActionController@through');//通过处理
    Route::patch('reject','ActionController@reject');//驳回

    Route::post('files','FileController@index')->middleware('crossDomain');//临时存储文件
});
Route::options('{a?}/{b?}/{c?}', function () {
    return response('', 204);
})->middleware('crossDomain');