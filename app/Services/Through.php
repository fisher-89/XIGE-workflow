<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15/015
 * Time: 15:12
 */

namespace App\Services;

use App\Models\Step;
use App\Models\StepRun;
use Illuminate\Support\Facades\Auth;

trait Through
{
    /**
     * 修改为通过
     * @param $request
     */
    public function saveThrough($request){
        $data = StepRun::with('steps')->where('flow_id',$request->flow_id)
            ->where('approver_sn',Auth::user()->staff_sn)
            ->find($request->step_run_id);
        $data->action_type = 2;
        $data->acted_at = date('Y-m-d H:i:s',time());
        $data->remark = trim(addslashes($request->remark));
        $data->save();
        if($data->steps->merge_type == 1)
            app('stepRun')->delMergeTypeFlowRunData($data->flow_id,$data->step_id,$data->flow_run_id);//删除合并类型未操作的数据
        return $data;
    }

    /**
     * 检测下一步骤是否为结束
     * @param $data
     */
    public function checkNextStep($data){
        $step = Step::find($data->step_id);
        if(empty($step->next_step_key)){
            //结束步骤
            app('flowRun')->endFlow($data->flow_run_id);
            return true;
        }
        return false;
    }


//    public function throughCreateNextStepRunData($request,$stepRunData){
//        $nextStepData = app('step')->getStep($stepRunData->flow_id, $stepRunData->steps->next_step_key);
//        foreach($nextStepData as $k=>$v){
//            if(in_array($v->step_key,array_pluck($request->approvers,'step_key'))){
//                if($v->concurrent_type == 0 && $v->merge_type ==1){
//
//                }else{
//
//                }
//            }
//        }
//    }

}