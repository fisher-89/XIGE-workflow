<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11/011
 * Time: 17:09
 */

namespace App\Services;


use App\Models\Step;

class StepService
{
    /*--------------------------------start------------------------------------*/
    /**
     * 通过流程模型
     * 获取开始步骤数据
     * @param $flowModel
     */
    public function getStartStepData($flowModel)
    {
        $step = $flowModel->steps->filter(function ($step) {
            return ($step->prev_step_key == []) && (!$step->deleted_at);
        });
        return $step[0];
    }

    /**
     * 获取下一步骤数据
     * @param $currentStepData
     */
    public function getNextStepData($currentStepData){
        $gridKeys = $currentStepData->flow->form->grid->pluck('key')->all();//获取控件key

        $flowId = $currentStepData->flow_id;
        $nextStepKey = $currentStepData->next_step_key;
        $nextStepData = $this->getStep($flowId,$nextStepKey);
        dump($nextStepData->toArray());
        if(count($nextStepData)>1){
            //下一步骤为多步骤
        }else{
            //下一步骤为一个步骤
            $this->allowCondition($nextStepData[0]);
        }
    }

    /**
     * 获取骤数据
     * @param $flowId
     * @param array $stepKey
     * @return mixed
     */
    public function getStep($flowId, $stepKey)
    {
        return Step::whereFlowId($flowId)->whereIn('step_key',$stepKey)->get();
    }

    /**
     * todo 未完成
     * 访问条件
     * @param $stepModel
     */
    private function allowCondition($stepModel){
//        $allow = true;
//        if(!empty($stepModel->allow_condition)){
//            $allowCondition = app('field')->analysisDefaultValueVariate($stepModel->allow_condition,$stepModel->flow->form->fields);
//            if(!$allowCondition){
//                $allow = false;
//            }
//        }
//        return $allow;
    }
    /*--------------------------------end------------------------------------*/
    /**
     * 获取开始步骤
     * @param $flowId
     *
     */
    public function getStartStep($flowId)
    {
        $data = Step::where(['flow_id' => $flowId, 'prev_step_key' => '[]'])->whereNull('deleted_at')->first();
        return $data;
    }

    /**
     * 获取最后步骤
     * @param $flowId
     * @return mixed
     */
    public function getEndStep($flowId)
    {
        $data = Step::where(['flow_id' => $flowId, 'next_step_key' => '[]'])->whereNull('deleted_at')->first();
        return $data;
    }

    /**
     * 获取当前步骤
     * @param $stepId
     */
    public function getCurrentStep($stepId)
    {
        return Step::find($stepId);
    }



}