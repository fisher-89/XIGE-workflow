<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/12/012
 * Time: 16:57
 */

namespace App\Services;


use App\Models\StepRun;
use Illuminate\Support\Facades\Auth;

class StepRunService
{
    protected $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * 创建步骤运行开始数据
     * @param $startStepData
     * @param $flowRunData
     * @param $formDataId
     */
    public function createStartStepRun($startStepData,$flowRunData,$formDataId){
        $column['step_id'] = $startStepData->id;
        $column['step_name'] = $startStepData->name;
        $column['flow_id'] = $startStepData->flow_id;
        $column['flow_name'] = $flowRunData->name;
        $column['flow_run_id'] = $flowRunData->id;
        $column['form_id'] = $flowRunData->form_id;
        $column['data_id'] = $formDataId;
        $column['approver_sn'] = $this->user->staff_sn;
        $column['approver_name'] = $this->user->realname;
        $column['action_type'] = 1;
        StepRun::create($column);
    }


    /*---------------------------------------------------*/

    public function createStepRun($stepData,$flowRunData,$formDataId,$staff){
        $column['step_id'] = $stepData->id;
        $column['step_name'] = $stepData->name;
        $column['flow_id'] = $stepData->flow_id;
        $column['flow_name'] = $flowRunData->name;
        $column['flow_run_id'] = $flowRunData->id;
        $column['form_id'] = $flowRunData->form_id;
        $column['data_id'] = $formDataId;
        $column['approver_sn'] = $staff['staff_sn'];
        $column['approver_name'] = $staff['realname'];
        $column['action_type'] = 0;
        StepRun::create($column);
    }

    /**
     * 获取当前人未操作的步骤运行数据
     * @param $flowId
     */
    public function getCurrentUserStepData($flowId){
        $data = StepRun::with('steps')
            ->where(['flow_id'=>$flowId,'approver_sn'=>$this->user->staff_sn])
            ->where('action_type',0)
            ->whereNull('deleted_at')
            ->first();
        $data->checked_at = date('Y-m-d H:i:s',time());
        $data->save();
        $formData = app('formData',['formId'=>$data->form_id])->find($data->data_id);
        $nextStepData = app('step')->getStep($flowId, $data->next_step_key);
        $data['next_step_data'] = $nextStepData;
        $data['form_data'] = $formData;
        return $data;
    }

    /**
     * 删除合并类型为操作的数据
     * @param $flowId
     * @param $stepId
     * @param $flowRunId
     */
    public function delMergeTypeFlowRunData($flowId,$stepId,$flowRunId){
        StepRun::where(['flow_id'=>$flowId,'step_id'=>$stepId,'flow_run_id'=>$flowRunId,'action_type'=>0])->delete();
    }
}