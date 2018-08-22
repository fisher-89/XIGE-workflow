<?php
/**
 * 撤回类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6/006
 * Time: 14:35
 */

namespace App\Services\Web;


use App\Jobs\SendCallback;
use App\Models\FlowRun;
use Illuminate\Support\Facades\DB;

class WithdrawService
{
    protected $staffSn;

    public function __construct()
    {
        $this->staffSn = app('auth')->id();
    }
    /**
     * 撤回
     * @param $request
     */
    public function withdraw($request){
        $flowRunId = $request->flow_run_id;
        $flowRunData = FlowRun::with(['stepRun'=>function($query){
            $query->whereActionType(0);
        }])->find($flowRunId);
        DB::transaction(function()use(&$flowRunData){
            //修改发起状态
            $flowRunData->status = -2;
            $flowRunData->end_at = date('Y-m-d H:i:s');
            $flowRunData->save();
            //修改步骤运行状态
            $flowRunData->stepRun = $flowRunData->stepRun->map(function($stepRun){
                $stepRun->action_type = -2;
                $stepRun->acted_at = date('Y-m-d H:i:s');
                $stepRun->save();
                return $stepRun;
            });
        });
        //撤回回调
        $flowRunData->stepRun->each(function($stepRun){
            SendCallback::dispatch($stepRun->id,'step_withdraw');
        });
        return $flowRunData;
    }
}