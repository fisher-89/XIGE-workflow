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


use App\Models\Step;
use App\Models\StepRun;
use Illuminate\Support\Facades\Auth;

class FlowStepChartRepository
{
    public function getFlowStepChart(int $stepRunId)
    {
        $currentStepRunData = StepRun::where('approver_sn',Auth::id())->findOrFail($stepRunId);
        $allStepRun = StepRun::where('flow_run_id',$currentStepRunData->flow_run_id)
            ->where('action_type','<>',-3)
            ->orderBy('acted_at','asc')
            ->get();
        //未处理的
        $pendingData = $allStepRun->where('acted_at',null)->pluck([]);
        //已处理完成的
        $finishedData = $allStepRun->whereNotIn('acted_at',[null])->pluck([]);
        $finishedData = $finishedData->map(function($stepRun)use($allStepRun){
            $stepRun = $this->getStepRunData($stepRun);
            return $stepRun;
        });

        $pendingData = $pendingData->map(function($stepRun)use($allStepRun){
            $stepRun = $this->getStepRunData($stepRun);
            return $stepRun;
        });

        return array_collapse([$finishedData,$pendingData]);
    }

    protected function getStepRunData($stepRun)
    {
        $stepRun->next = $stepRun->next_id;
        $stepRun->prev = $stepRun->prev_id;
        $stepRun = $stepRun->only(['id','step_id','step_key','approver_sn','approver_name','action_type','next','prev','acted_at']);
        return $stepRun;
    }

}