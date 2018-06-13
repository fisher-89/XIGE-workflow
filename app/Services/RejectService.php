<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9/009
 * Time: 15:29
 */

namespace App\Services;


use App\Models\StepRun;

class RejectService
{
    /**
     *驳回
     * @param $request
     * @return mixed
     */
    public function reject($request)
    {
        $stepRunData = StepRun::find($request->input('step_run_id'));
        $rejectType = (int)$stepRunData->steps->reject_type;//退回类型
        //检测是否可以退回
        if ($rejectType == 0)
            abort(400, '当前步骤不能进行驳回处理');
        $stepRunData->action_type = -1;
        $stepRunData->acted_at = date('Y-m-d H:i:s');
        $stepRunData->remark = trim($request->input('remark'));
        $stepRunData->save();

        $stepRunData->flowRun->status = -1;
        $stepRunData->flowRun->end_at = date('Y-m-d H:i:s');
        $stepRunData->flowRun->save();
        return $stepRunData;
    }
}