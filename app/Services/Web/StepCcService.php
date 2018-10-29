<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29/029
 * Time: 11:29
 * 步骤抄送
 */

namespace App\Services\Web;


class StepCcService
{
    /**
     * 创建抄送人数据
     * @param array $cacheFormData
     * @param $stepRun
     */
    public function makeStepCc(array $cacheFormData, $stepRun)
    {
        //抄送人
        $requestCcPerson = request()->get('cc_person', []);
        //
        $isCc = $cacheFormData['is_cc'];
        //默认抄送人
        $defaultCcPerson = $cacheFormData['cc_person'];
        if ($isCc) {
            if ($requestCcPerson) {
                $data = array_map(function ($staff) use ($stepRun) {
                    return [
                        'step_id' => $stepRun->step_id,
                        'step_name' => $stepRun->step_name,
                        'flow_id' => $stepRun->flow_id,
                        'flow_name' => $stepRun->flow_name,
                        'flow_run_id' => $stepRun->flow_run_id,
                        'form_id' => $stepRun->form_id,
                        'data_id' => $stepRun->data_id,
                        'staff_sn' => $staff['staff_sn'],
                        'staff_name' => $staff['staff_name'],
                    ];
                }, $requestCcPerson);
                $stepRun->stepCc()->createMany($data);
            }
        }
    }
}