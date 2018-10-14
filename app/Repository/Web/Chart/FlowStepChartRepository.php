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
        $currentStepRunData = StepRun::where('approver_sn', Auth::id())->findOrFail($stepRunId);
        $allCurrentStepRunData = StepRun::where(['flow_run_id' => $currentStepRunData->flow_run_id])->orderBy('id','asc')->get();
        return[
            'data'=>$allCurrentStepRunData,
            'current'=>$currentStepRunData,
        ];
    }
}