<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresetRequest;
use App\Http\Requests\StartRequest;
use App\Http\Requests\ThroughRequest;
use App\Models\Flow;
use App\Services\Auth\FlowAuth;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * 流程预提交处理
     * @param Request $request
     */
    public function preset(PresetRequest $request,Flow $flow){
        //创建流程运行数据、表单字段数据（与控件）、步骤运行数据
//        app('action')->preset($request,$flow);

        $currentStepData = app('step')->getStartStepData($flow);//当前步骤数据
        //获取下一步骤的数据
        $nextStepData = app('step')->getNextStepData($currentStepData);
    }
    /**
     * 流程发起处理
     * @param StartRequest $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function start(StartRequest $request)
    {
        dd(4);
        app('action')->start($request);
        return response('success');
//        return app('curl')->get('192.168.20.238:8003/api/staff/110105');
    }


    /**
     * 获取当前用户的步骤运行数据
     * @param Request $request
     * @return mixed
     */
    public function getCurrentUserStepData(Request $request){
        return app('action')->getCurrentUserStepData($request->flow_id);
    }

    /**
     * 流程步骤通过处理
     * @param Request $request
     */
    public function through(ThroughRequest $request)
    {
        app('action')->through($request);
    }
}
