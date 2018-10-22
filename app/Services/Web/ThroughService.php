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
use App\Models\SubStep;
use App\Services\Notification\MessageNotification;
use Illuminate\Support\Facades\DB;

class ThroughService
{
    protected $stepRun;
    protected $formData;
    protected $tablePrefix = 'form_data_';//表名前缀
    protected $dingTalkMessage;
    //预提交
    protected $presetService;
    //发起
    protected $startService;

    public function __construct(PresetService $presetService, StartService $startService)
    {
        $this->dingTalkMessage = new MessageNotification();
        $this->presetService = $presetService;
        $this->startService = $startService;
    }

    /**
     * 通过处理
     * @param $request
     * @param $flow
     * @return mixed
     */
    public function through($request)
    {
        //步骤运行数据
        $this->stepRun = StepRun::find($request->input('step_run_id'));

        $cacheFormData = $this->presetService->getPresetData($request->input('timestamp'));
        if (!$cacheFormData)
            abort(404, '预提交数据已失效，请重新提交数据');
//        $this->startService->checkStartRequest($request, $cacheFormData);//检测审批人数据与step_run_id是否正确、缓存是否失效
        $this->formData = $cacheFormData['form_data'];
        $nextStepRunData = $this->saveThrough($request, $cacheFormData['step_end']);

        //步骤通过回调
        SendCallback::dispatch($this->stepRun->id, 'step_agree');
        //步骤结束回调
        SendCallback::dispatch($this->stepRun->id, 'step_finish');

        //更新待办
        $this->dingTalkMessage->updateTodo($this->stepRun->id);

        if (empty($nextStepRunData) && $cacheFormData['step_end'] == 1) {
            //流程结束
            //流程结束回调
            SendCallback::dispatch($this->stepRun->id, 'finish');
            //发送流程结束 text工作通知
            $content = '你发起的'.$this->stepRun->flow_name.'流程审批已结束';
            $this->dingTalkMessage->sendJobTextMessage($this->stepRun,$content);
        } else {
            //流程未结束

            //步骤开始回调
            $nextStepRunData->each(function ($stepRun) {
                SendCallback::dispatch($stepRun->id, 'step_start');
            });

            //发送钉钉消息（发送给下一步审批人）
            $this->sendMessage($nextStepRunData);
        }
        return $this->stepRun;
    }

    /**
     * 发送钉钉通知
     * @param $nextStepRunData
     */
     protected function sendMessage($nextStepRunData)
     {
         //表单Data
         $formData = $this->presetService->formRepository->getFormData($this->stepRun->flow_run_id);

         //发送待办通知
         if(config('oa.is_send_message.todo')){
             //允许发送待办通知
             $nextStepRunData->each(function ($stepRun) use ($formData) {
                 $this->dingTalkMessage->sendTodoMessage($stepRun, $formData);
             });
         }
         //发送工作通知OA消息
         if (config('oa.is_send_message.message')) {
             $nextStepRunData->each(function ($stepRun) use ($formData) {
                 $this->dingTalkMessage->sendJobOaMessage($stepRun, $formData);
             });
         }
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
//            if ($this->stepRun->steps->merge_type == 1)
//                $this->stepMergeTypeSave();
            //更新formData
            $this->updateFormData();
            if ($isStepEnd == 1) {
                //结束步骤(流程结束处理)
                $this->endFlow();
            } else {
                //下一步骤审批没数据
                if(count($request->input('next_step')) == 0){
                    $nextMergeType = 0;
                    $nextPrevStepKeyCount = 0;
                    $pendingCount = 0;
                    $subStepKey = [];
                    if(count($this->stepRun->steps->next_step_key) == 1){
                        $nextStepData = Step::where(['flow_id'=>$this->stepRun->flow_id,'step_key'=>$this->stepRun->steps->next_step_key[0]])->first();
                        $nextMergeType = $nextStepData->merge_type;
                        $nextPrevStepKeyCount = count($nextStepData->prev_step_key);
                        $subStepKey = SubStep::where('parent_key', $nextStepData->step_key)->where('flow_id', $this->stepRun->flow_id)->pluck('step_key')->all();
                        $pendingCount = StepRun::where(['flow_id' => $this->stepRun->flow_id, 'flow_run_id' => $this->stepRun->flow_run_id, 'action_type' => 0])->whereIn('step_key', $subStepKey)->count();
                    }
                    if ($nextPrevStepKeyCount > 0 && $nextMergeType == 0 && $pendingCount > 0) {
                        //下一步骤合并类型为非必须 其它步骤未操作的数据为取消状态
                        $this->stepMergeTypeSave($subStepKey);
                    }

                }else{
                    $nextStepRunData = $this->createNextStepRunData($request->input('next_step'));
                    $this->stepRun->next_id = json_encode($nextStepRunData->pluck('id')->all());
                    $this->stepRun->save();
                }

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
    protected function stepMergeTypeSave($subStepKey)
    {
        StepRun::where([
            'flow_id' => $this->stepRun->flow_id,
            'flow_run_id' => $this->stepRun->flow_run_id,
            'action_type' => 0
        ])->whereIn('step_key',$subStepKey)->update(['action_type' => -3]);
    }

    /**
     * 修改表单数据
     */
    protected function saveFormData()
    {
        $formFieldsData = Field::where('form_id', $this->stepRun->form_id)->whereNull('form_grid_id')->get();
        $formFieldsKeys = $formFieldsData->pluck('key')->all();
        $formFieldsDataKeyBy = $formFieldsData->keyBy('key')->all();

        $formData = array_only($this->formData, $formFieldsKeys);
        if ($formData && count($formData) > 0) {
            foreach ($formData as $k => $v) {
                if (is_array($v)) {
                    $fieldType = $formFieldsDataKeyBy[$k]->type;
                    $newFieldValue = $this->setFieldTypeData($v, $fieldType, $k);
                    if ($fieldType == 'region') {
                        //地区级数
                        $regionLevel = $formFieldsDataKeyBy[$k]->region_level;
                        switch ($regionLevel) {
                            case 1;
                                $formData['province_id'] = $v ? $v['province_id'] : null;
                                break;
                            case 2;
                                $formData['province_id'] = $v ? $v['province_id'] : null;
                                $formData['city_id'] = $v ? $v['city_id'] : null;
                                break;
                            case 3;
                                $formData['province_id'] = $v ? $v['province_id'] : null;
                                $formData['city_id'] = $v ? $v['city_id'] : null;
                                $formData['county_id'] = $v ? $v['county_id'] : null;
                                break;
                            case 4;
                                $formData['province_id'] = $v ? $v['province_id'] : null;
                                $formData['city_id'] = $v ? $v['city_id'] : null;
                                $formData['county_id'] = $v ? $v['county_id'] : null;
                                $formData['address'] = $v ? $v['address'] : null;
                                break;
                        }
                    } elseif ($fieldType == 'file') {
                        $v = $newFieldValue;
                    }
                    $formData[$k] = json_encode($v);
                }
            }
            DB::table($this->tablePrefix . $this->stepRun->form_id)
                ->where('id', $this->stepRun->data_id)
                ->update($formData);
        }
    }

    /**
     * 文件、员工控件、部门控件、店铺控件类型处理
     * @param array $fieldValue
     * @param $fieldType
     * @param string $fieldKey
     * @param $flowRun
     * @param $gridKey
     * @return array|mixed
     */
    protected function setFieldTypeData(array $fieldValue, $fieldType, string $fieldKey, $gridKey = false)
    {
        switch ($fieldType) {
            case 'file':
                //文件处理
                if ($fieldValue) {
                    $fieldValue = $this->startService->moveTempFile($fieldValue);
                }
                break;
            case 'staff':
                $this->updateFieldWidgetData($fieldValue, $fieldKey, $gridKey);
                break;
            case 'department':
                $this->updateFieldWidgetData($fieldValue, $fieldKey, $gridKey);
                break;
            case 'shop':
                $this->updateFieldWidgetData($fieldValue, $fieldKey, $gridKey);
                break;
        }
        return $fieldValue;
    }

    /**
     * 修改字段控件data数据
     * @param array $fieldValue
     * @param string $fieldKey
     * @param $gridKey
     */
    protected function updateFieldWidgetData(array $fieldValue, string $fieldKey, $gridKey)
    {
        if ($gridKey) {
            //表单控件data控件
            $tableName = $this->tablePrefix . $this->stepRun->form_id . '_' . $gridKey . '_fieldType_' . $fieldKey;
        } else {
            //表单data控件
            $tableName = $this->tablePrefix . $this->stepRun->form_id . '_fieldType_' . $fieldKey;
        }
        //删除表单字段控件数据
        DB::table($tableName)->where('run_id', $this->stepRun->flow_run_id)->delete();
        if ($fieldValue) {
            $data = $fieldValue;
            if (count($data) == count($data, 1)) {
                //单选  一维数组
                $data['run_id'] = $this->stepRun->flow_run_id;
            } else {
                //多选 二维数组
                data_fill($data, '*.run_id', $this->stepRun->flow_run_id);
            }
            DB::table($tableName)->insert($data);
        }
    }


    /**
     * 修改表单控件数据
     */
    protected function saveGridFormData()
    {
        $gridData = FormGrid::where('form_id', $this->stepRun->form_id)->get();

        if ($gridData) {
            //该表单有控件
            $gridDataKeyBy = $gridData->keyBy('key')->all();
            $gridKeys = $gridData->pluck('key')->all();
            $formGridData = array_only($this->formData, $gridKeys);
            if ($formGridData) {
                //表单控件有数据
                foreach ($formGridData as $gridKey => $v) {
                    $gridFieldsData = $gridDataKeyBy[$gridKey]->fields;
                    $gridFieldsDataKeyBy = $gridFieldsData->keyBy('key')->all();
                    if (count($v) < 1) {
                        //无控件data  删除表单控件data
                        $this->deleteFormGridData($gridKey, $gridFieldsDataKeyBy);
                    } else {
                        $this->updateGridFormData($v,$gridKey,$gridFieldsDataKeyBy);
                    }
                }
            }
        }
    }

    /**
     * 删除控件表单Data
     * @param $gridKey
     * @param $gridFieldsDataKeyBy
     */
    protected function deleteFormGridData($gridKey, $gridFieldsDataKeyBy)
    {
        $tableName = $this->tablePrefix . $this->stepRun->form_id . '_' . $gridKey;
        foreach($gridFieldsDataKeyBy as $field){
            $gridWidgetTableName = $tableName . '_fieldType_' . $field->key;
            switch ($field->type) {
                case 'staff':
                    DB::table($gridWidgetTableName)->where('run_id', $this->stepRun->flow_run_id)->delete();
                    break;
                case 'department':
                    DB::table($gridWidgetTableName)->where('run_id', $this->stepRun->flow_run_id)->delete();
                    break;
                case 'shop':
                    DB::table($gridWidgetTableName)->where('run_id', $this->stepRun->flow_run_id)->delete();
                    break;
            }
        }
        DB::table($tableName)->where('data_id', $this->stepRun->data_id)->delete();
    }

    protected function updateGridFormData($gridFormData,$gridKey,$gridFieldsDataKeyBy)
    {
        //删除表单控件数据
        $this->deleteFormGridData($gridKey,$gridFieldsDataKeyBy);
        //获取新增表单控件数据
        foreach ($gridFormData as $k=>$v){
            foreach ($v as $fieldKey=>$value){
                $gridFormData[$k]['run_id'] = $this->stepRun->flow_run_id;
                $gridFormData[$k]['data_id'] = $this->stepRun->data_id;
                if (is_array($value)) {
                    if ($value) {
                        $fieldType = $gridFieldsDataKeyBy[$fieldKey]->type;
                        $newFieldValue = $this->setFieldTypeData($value, $fieldType, $fieldKey, $gridKey);
                        if ($fieldType == 'region') {
                            //地区级数
                            $regionLevel = $gridFieldsDataKeyBy[$fieldKey]->region_level;
                            switch ($regionLevel) {
                                case 1;
                                    $gridFormData[$k]['province_id'] = $value['province_id'];
                                    break;
                                case 2;
                                    $gridFormData[$k]['province_id'] = $value['province_id'];
                                    $gridFormData[$k]['city_id'] = $value['city_id'];
                                    break;
                                case 3;
                                    $gridFormData[$k]['province_id'] = $value['province_id'];
                                    $gridFormData[$k]['city_id'] = $value['city_id'];
                                    $gridFormData[$k]['county_id'] = $value['county_id'];
                                    break;
                                case 4;
                                    $gridFormData[$k]['province_id'] = $value['province_id'];
                                    $gridFormData[$k]['city_id'] = $value['city_id'];
                                    $gridFormData[$k]['county_id'] = $value['county_id'];
                                    $gridFormData[$k]['address'] = $value['address'];
                                    break;
                            }
                        } elseif ($fieldType == 'file') {
                            $value = $newFieldValue;
                        }
                    }
                    $gridFormData[$k][$fieldKey] = json_encode($value);
                }
            }
        }
        //新增表单data控件数据
        $tableName = $this->tablePrefix.$this->stepRun->form_id.'_'.$gridKey;
        DB::table($tableName)->insert($gridFormData);
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