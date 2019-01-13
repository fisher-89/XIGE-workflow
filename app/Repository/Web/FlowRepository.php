<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14/014
 * Time: 16:32
 */

namespace App\Repository\Web;


use App\Models\Flow;
use App\Models\Step;
use App\Models\StepRun;

class FlowRepository
{
    /**
     * 获取流程的第一步
     * @param $flow Flow 或flow_id
     */
    public function getFlowFirstStep($flow)
    {
        if (is_numeric($flow)) {
            $flow = Flow::find($flow);
        }
        $firstStep = Step::where(['flow_id' => $flow->id, 'prev_step_key' => '[]'])
            ->whereNull('deleted_at')
            ->first();
        return $firstStep;
    }

    /**
     * 获取当前步骤数据
     * @param $stepRun
     */
    public function getCurrentStep($stepRun)
    {
        if (is_numeric($stepRun)) {
            $stepRun = StepRun::find($stepRun);
        }
        $step = $this->getStep($stepRun->step_id);
        return $step;
    }

    /**
     * 获取步骤数据
     * @param $step
     */
    public function getStep($step)
    {
        if (is_numeric($step)) {
            $step = Step::with(['flow.form','flow' => function ($query) {
                $query->withTrashed();
            }])->find($step);
        }
        return $step;
    }
}