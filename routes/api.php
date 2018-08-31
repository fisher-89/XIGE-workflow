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
//文件上传跨域
Route::options('{a?}/{b?}/{c?}', function () {
    return response('', 204);
})->middleware('crossDomain');

Route::middleware('auth:api')->namespace('Api\Web')->group(function () {
    Route::get('list', 'ResourceController@getFlowList');//获取可发起的流程
    Route::get('start/{flow}', 'ResourceController@start');//获取发起数据
    Route::post('preset/{flow}', 'ActionController@preset');//预提交处理
    Route::post('start/{flow}', 'ActionController@start');//发起处理
    Route::get('approval','ResourceController@getApproval');//获取审批列表
    Route::get('approval/{stepRun}','ResourceController@getApprovalDetail');//获取审批详情
    Route::get('sponsor','ResourceController@getSponsor');//获取发起列表
    Route::get('sponsor/{flow_run_id}','ResourceController@getSponsorDetail');//获取发起详情
    Route::patch('withdraw','ActionController@withdraw');//撤回
    Route::patch('through','ActionController@through');//通过处理
    Route::patch('reject','ActionController@reject');//驳回
    Route::post('deliver','ActionController@deliver');//转交
    Route::get('flow-chart/{step_run_id}','ChartController@index');//流程图

    Route::post('files','FileController@index')->middleware('crossDomain');//临时存储文件
    Route::delete('clear-temp-file','FileController@clearTempFile');//清楚临时文件

    //获取员工数据
    Route::get('/staff','WidgetController@getStaff');
    //获取部门
    Route::get('/department','WidgetController@getDepartment');
    //获取店铺
    Route::get('/shop','WidgetController@getShops');
});

//待办事项通知回调
Route::post('/callback/todo','Api\Web\CallbackController@todo')->name('todo');