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
            $stepRun = $this->getStepRunData($stepRun,$allStepRun);
            return $stepRun;
        });

        $pendingData = $pendingData->map(function($stepRun)use($allStepRun){
            $stepRun = $this->getStepRunData($stepRun,$allStepRun);
            return $stepRun;
        });

        return array_collapse([$finishedData,$pendingData]);
    }

    protected function getStepRunData($stepRun,$allStepRun)
    {
        $step = $stepRun->steps;
        $prevStepIds = $this->getPrevStepId($step,$allStepRun);
        $nextStepIds = $this->getNextStepId($step,$allStepRun);
        $nextId = $allStepRun->whereIn('step_id',$nextStepIds)->pluck('id')->all();
        $prevId = $allStepRun->whereIn('step_id',$prevStepIds)->pluck('id')->all();
        $stepRun->next = $nextId;
        $stepRun->prev = $prevId;
        $stepRun = $stepRun->only(['id','step_id','step_key','approver_sn','approver_name','action_type','next','prev','acted_at']);
        return $stepRun;
    }


    /**
     * 获取上一步骤ID
     * @param $step
     * @param $allStepRun
     * @return array
     */
    protected function getPrevStepId($step,$allStepRun)
    {
        $prevStepId = [];
        if(count($step->prev_step_key) >0){
            $stepData = Step::where('flow_id',$step->flow_id)->whereIn('step_key',$step->prev_step_key)->get();
            $prevStepId = $stepData->pluck('id')->all();
            $allStepId = $allStepRun->pluck('step_id')->all();
            if(!array_has(array_unique($allStepId),$prevStepId)){
                foreach($stepData as $v){
                    if(count(array_diff($prevStepId,$allStepId))>0){
                        $prevStepId = $this->getPrevStepId($v,$allStepRun);
                    }
                }
            }
        }
        return $prevStepId;
    }

    /**
     * 获取下一步骤ID
     * @param $step
     * @param $allStepRun
     * @return array
     */
    protected function getNextStepId($step,$allStepRun)
    {
        $nextStepId = [];
        if(count($step->next_step_key) >0){
            $stepData = Step::where('flow_id',$step->flow_id)->whereIn('step_key',$step->next_step_key)->get();
            $nextStepId = $stepData->pluck('id')->all();
            $allStepId = $allStepRun->pluck('step_id')->all();
            //下一步骤ID不在步骤运行表里
            if(!array_has(array_unique($allStepId),$nextStepId)){
                foreach ($stepData as $v){
                    if(count(array_diff($nextStepId,$allStepId))>0){
                        $nextStepId = $this->getNextStepId($v,$allStepRun);
                    }
                }
            }
        }
        return $nextStepId;
    }
}