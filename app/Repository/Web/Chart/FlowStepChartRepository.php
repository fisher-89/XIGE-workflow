<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/14/014
 * Time: 10:45
 *
 * 流程步骤图
 */

namespace App\Repository\Web\Chart;


use App\Models\StepRun;
use Illuminate\Support\Facades\Auth;

class FlowStepChartRepository
{
    public function getFlowStepChart(int $stepRunId)
    {
        $currentStepRunData = StepRun::findOrFail($stepRunId);
        $allStepRun = StepRun::where('flow_run_id',$currentStepRunData->flow_run_id)
            ->where('action_type','<>',-3)
            ->select('id','step_id','step_key','approver_sn','approver_name','action_type','next_id','prev_id','acted_at')
            ->orderBy('acted_at','asc')
            ->get();
        //未处理的
        $pendingData = $allStepRun->where('acted_at',null)->pluck([]);
        //已处理完成的
        $finishedData = $allStepRun->whereNotIn('acted_at',[null])->pluck([]);
        $data = array_collapse([$finishedData,$pendingData]);
        return $data;
    }
}