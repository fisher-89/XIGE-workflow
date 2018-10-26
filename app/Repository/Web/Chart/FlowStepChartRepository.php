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
        $data = $allStepRun->map(function($stepRun)use($allStepRun){
            $step = $stepRun->steps;
            $nextStepIds = $this->getNextAndPrevStepId($step)['next'];
            $prevStepIds = $this->getNextAndPrevStepId($step)['prev'];
            $nextId = $allStepRun->whereIn('step_id',$nextStepIds)->pluck('id')->all();
            $prevId = $allStepRun->whereIn('step_id',$prevStepIds)->pluck('id')->all();
            $stepRun->next = $nextId;
            $stepRun->prev = $prevId;
            $stepRun = $stepRun->only(['id','step_id','step_key','approver_sn','approver_name','action_type','next','prev','acted_at']);
            return $stepRun;
        });
        return $data;
    }

    protected function getNextAndPrevStepId($step)
    {
        $nextStepKey = $step->next_step_key;
        $prevStepKey = $step->prev_step_key;
        $prevStepId = Step::where('flow_id',$step->flow_id)->whereIn('step_key',$prevStepKey)->pluck('id')->all();
        $nextStepId = Step::where('flow_id',$step->flow_id)->whereIn('step_key',$nextStepKey)->pluck('id')->all();
        return [
            'prev'=>$prevStepId,
            'next'=>$nextStepId
        ];
    }
}