<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5/005
 * Time: 10:53
 */

namespace App\Repository\Web;


use App\Models\StepRun;
use Illuminate\Support\Facades\DB;

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
        $data = StepRun::with('flowRun')
            ->where(['approver_sn' => $this->staffSn])
            ->whereIn('action_type', $actionType)
            ->when(($request->has('flow_id') && intval($request->flow_id)), function ($query) use ($request) {
                return $query->where('flow_id', $request->flow_id);
            })
            ->filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        //添加form_data数据

        if (array_has($data, 'data')) {
            $data['data'] = $this->getApproveFormData(collect($data['data']));
        } else {
            $data = $this->getApproveFormData($data);
        }
        return $data;
    }

    /**
     * 获取审批表单data
     * @param $StepRunData
     * @return mixed
     */
    protected function getApproveFormData($StepRunData)
    {
        return $StepRunData->map(function ($stepRun) {
            $tableName = 'form_data_' . $stepRun->form_id;
            $formData = (array)DB::table($tableName)->where('run_id', $stepRun->flow_run_id)->first();
            $formRepository = new FormRepository();
            $fields = $formRepository->getFields($stepRun->form_id);
            //可展示的字段
            $formField = $fields['form']->filter(function ($field, $key) use ($formData) {
                return (in_array($field->type, ['int', 'text', 'date', 'datetime', 'time', 'select', 'shop', 'staff', 'department']) && ($field->is_checkbox == 0));
            });

            //表单键值处理
            $newFormData = [];
            $count = 0;
            $formField->map(function ($field) use ($formData, &$newFormData, &$count) {
                $key = $field->name;
                $value = $formData[$field->key];
                if (!empty($value)) {
                    $count = $count + 1;
                    $newValue = json_decode($value, true);
                    if (is_array($newValue) && $newValue && !is_null($newValue)) {
                        $value = $newValue['text'];
                    }
                    if ($count < 4) {
                        $newFormData[] = [$key => $value];
                    }
                }
            })->all();

            $stepRun->form_data = $newFormData;
            return $stepRun;
        });
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
        $data = [
            'step' => $currentStepData,
            'form_data' => $formData,
            'fields' => $fields,
            'flow_run' => $stepRun->flowRun->toArray(),
            'step_run' => $stepRun,
            //抄送人
            'cc_person' => $stepRun->stepCc()->select('staff_sn', 'staff_name')->get()->toArray(),
            'field_groups'=>$stepRun->fieldGroups->toArray()
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
            case 'approved'://已审批
                $actionType = [2, 3, -1];
                break;
            default:
                $actionType = [];
        }
        return $actionType;
    }
}