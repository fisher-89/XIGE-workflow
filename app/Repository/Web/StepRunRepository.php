<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5/005
 * Time: 10:53
 */

namespace App\Repository\Web;


use App\Models\StepRun;

class StepRunRepository
{
    protected $user;
    protected $staffSn;

    public function __construct()
    {
        $this->staffSn = app('auth')->id();
        $this->user = app('auth')->user();
    }

    /**
     * 获取审批列表
     * @param $request
     * @return mixed
     */
    public function getApproval($request)
    {
        $actionType = $this->actionType($request->type);
        $data = StepRun::with('flowRun')->where(['approver_sn' => $this->staffSn])
            ->whereIn('action_type', $actionType)
            ->when(($request->has('flow_id') && intval($request->flow_id)), function ($query) use ($request) {
                return $query->where('flow_id', $request->flow_id);
            })
            ->filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        return $data;
    }

    /**
     *  获取详情(发起、审批)
     * @param $stepRun
     * @return array
     */
    public function getDetail($stepRun)
    {
        $flowRepository = new FlowRepository();
        $currentStepData = $flowRepository->getCurrentStep($stepRun);//当前步骤数据

        $formRepository = new FormRepository();
        //表单字段
        $fields = $formRepository->getFields($stepRun->form_id);

        //表单data
        $formData = $formRepository->getFormData($stepRun->flow_run_id);//获取表单data数据
        $stepRun->checked_at = date('Y-m-d H:i:s');
        $stepRun->save();
        $data = [
            'step' => $currentStepData,
            'form_data' => $formData,
            'fields' => $fields,
            'flow_run' => $stepRun->flowRun->toArray(),
            'step_run' => $stepRun,
        ];
        return $data;
    }

    /**
     * 获取步骤类型
     * @param $type
     * @return array
     */
    protected function actionType($type)
    {
        switch ($type) {
            case 'all'://全部
                $actionType = [0, 2, 3, -1];
                break;
            case 'processing'://待审批
                $actionType = [0];
                break;
            case 'approved'://已通过
                $actionType = [2];
                break;
            case 'deliver'://已转交
                $actionType = [3];
                break;
            case 'rejected'://已驳回
                $actionType = [-1];
                break;
            default:
                $actionType = [0, 2, 3, -1];
        }
        return $actionType;
    }
}