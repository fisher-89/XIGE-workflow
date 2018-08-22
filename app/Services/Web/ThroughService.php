<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/7/007
 * Time: 9:34
 */

namespace App\Services\Web;


use App\Jobs\SendCallback;
use App\Models\Field;
use App\Models\FormGrid;
use App\Models\Step;
use App\Models\StepRun;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class ThroughService
{
    protected $stepRun;
    protected $formData;
    protected $tablePrefix = 'form_data_';//表名前缀
    protected $message;

    public function __construct($stepRunId)
    {
        $this->stepRun = StepRun::find($stepRunId);
        $this->message = new MessageNotification();
    }

    /**
     * 通过处理
     * @param $request
     * @param $flow
     * @return mixed
     */
    public function through($request)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'));
        if (!$cacheFormData)
            abort(404, '预提交数据已失效，请重新提交数据');
        app('action')->checkStartRequest($request, $cacheFormData);//检测审批人数据与step_run_id是否正确、缓存是否失效
        $this->formData = $cacheFormData['form_data'];
        $nextStepRunData = $this->saveThrough($request, $cacheFormData['step_end']);
        app('preset')->forgetPresetData($request->input('timestamp'));//清楚预提交缓存数据

        //步骤通过回调
        SendCallback::dispatch($this->stepRun->id, 'step_agree');
        //步骤结束回调
        SendCallback::dispatch($this->stepRun->id, 'step_finish');
        if (empty($nextStepRunData) && $cacheFormData['step_end'] == 1) {
            //流程结束
            //流程结束回调
            SendCallback::dispatch($this->stepRun->id, 'finish');
        } else {
            //流程未结束

            //发送消息给流程发起人

            //发送消息给下一步审批人
//            $this->message->sendPendingApprovalMessage($this->stepRun,$nextStepRunData);

        }
        return $this->stepRun;
    }

    /**
     * 通过保存
     * @param $request
     * @param $isStepEnd
     */
    protected function saveThrough($request, $isStepEnd)
    {
        $nextStepRunData = [];//下一步骤运行数据
        DB::transaction(function () use ($request, $isStepEnd, &$nextStepRunData) {
            //当前步骤运行数据状态操作
            $this->saveCurrentStep($request->input('remark'));
            //合并类型未操作的数据为取消状态
            if ($this->stepRun->steps->merge_type == 1)
                $this->stepMergeTypeSave();
            //更新formData
            $this->updateFormData();
            if ($isStepEnd == 1) {
                //结束步骤(流程结束处理)
                $this->endFlow();
            } else {
                $nextStepRunData = $this->createNextStepRunData($request->input('next_step'));
                $this->stepRun->next_id = json_encode($nextStepRunData->pluck('id')->all());
                $this->stepRun->save();
            }
        });
        return $nextStepRunData;
    }

    /**
     * 更新formData
     */
    protected function updateFormData()
    {
        $this->saveFormData();
        $this->saveGridFormData();
    }

    /**
     * 修改当前步骤数据
     * @param $remark
     */
    protected function saveCurrentStep($remark)
    {
        $this->stepRun->action_type = 2;
        $this->stepRun->acted_at = date('Y-m-d H:i:s');
        $this->stepRun->remark = $remark;
        $this->stepRun->save();
    }

    /**
     * 步骤合并类型为1时 其它步骤修改为取消状态
     */
    protected function stepMergeTypeSave()
    {
        StepRun::where([
            'flow_id' => $this->stepRun->flow_id,
            'step_id' => $this->stepRun->step_id,
            'flow_run_id' => $this->stepRun->flow_run_id,
            'action_type' => 0
        ])->update(['action_type' => -3]);
    }

    /**
     * 修改表单数据
     */
    protected function saveFormData()
    {
        $formFields = Field::where('form_id', $this->stepRun->form_id)->whereNull('form_grid_id')->pluck('key')->all();
        $formData = array_only($this->formData, $formFields);
        $formData = array_map(function ($item) {
            if (is_array($item))
                $item = json_encode($item);
            return $item;
        }, $formData);
        if (count($formData) > 0) {
            DB::table($this->tablePrefix . $this->stepRun->form_id)
                ->where('id', $this->stepRun->data_id)
                ->update($formData);
        }

    }

    /**
     * 修改表单控件数据
     */
    protected function saveGridFormData()
    {
        $gridKeys = (array)FormGrid::where('form_id', $this->stepRun->form_id)->pluck('key')->all();//控件key
        $formGridData = array_only($this->formData, $gridKeys);
        if (!empty($formGridData)) {
            foreach ($formGridData as $k => $v) {
                $tableName = $this->tablePrefix . $this->stepRun->form_id . '_' . $k;
                if (!empty($v)) {
                    foreach ($v as $gridKey => $value) {
                        if (array_has($value, 'id') && intval($value['id'])) {
                            //编辑
                            DB::table($tableName)->where(['id' => $value['id'], 'data_id' => $this->stepRun->data_id])->update($value);
                        } else {
                            //新增
                            $value['data_id'] = $this->stepRun->data_id;
                            $value['run_id'] = $this->stepRun->flow_run_id;
                            DB::table($tableName)->insert($value);
                        }
                    }
                }
            }
        }
    }

    /**
     * 流程结束处理
     * @param $id
     */
    protected function endFlow()
    {
        $this->stepRun->flowRun->status = 1;
        $this->stepRun->flowRun->end_at = date('Y-m-d H:i:s', time());
        $this->stepRun->flowRun->save();
    }

    /**
     * 创建下一步骤运行数据
     * @param $nextSteps
     */
    protected function createNextStepRunData(array $nextSteps)
    {
        $nextData = [];
        foreach ($nextSteps as $v) {
            $stepData = Step::find($v['step_id']);
            $v['step_key'] = $stepData->step_key;
            $v['step_name'] = $stepData->name;
            $v['flow_type_id'] = $this->stepRun->flow_type_id;
            $v['flow_id'] = $this->stepRun->flow_id;
            $v['flow_name'] = $this->stepRun->flow_name;
            $v['flow_run_id'] = $this->stepRun->flow_run_id;
            $v['form_id'] = $this->stepRun->form_id;
            $v['data_id'] = $this->stepRun->data_id;
            $v['action_type'] = 0;
            $stepRunData = StepRun::create($v);
            $nextData[] = $stepRunData;
        }
        return collect($nextData);
    }
}