<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/27/027
 * Time: 15:12
 */

namespace App\Services\Web;


use App\Models\Field;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\FormGrid;
use App\Models\Step;
use App\Models\StepRun;
use App\Repository\Web\FlowRepository;
use App\Services\Notification\MessageNotification;
use App\Services\Web\File\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StartService
{
    protected $tablePrefix = 'form_data_';//表单data表名前缀
    protected $flowId;//流程ID
    //预提交
    protected $presetService;
    //文件处理
    protected $images;
    //消息通知
    protected $dingTalkMessage;

    //抄送人
    protected $cc;
    //发起回调
    protected $sendCallback;

    public function __construct(PresetService $presetService, Images $images)
    {
        $this->presetService = $presetService;
        $this->images = $images;
        $this->dingTalkMessage = new MessageNotification();
        $this->cc = new StepCcService();
        $this->sendCallback = new SendCallbackService();
    }


    /**
     * 发起处理
     * @param $request
     */
    public function makeStart($request)
    {
        $this->flowId = $request->flow_id;
        $cacheFormData = $this->presetService->getPresetData($request->input('timestamp'));
        if (is_null($cacheFormData))
            abort(404, '预提交数据已失效，请重新提交数据');
//        $this->checkStartRequest($request, $cacheFormData);//检测审批人数据与step_run_id是否正确、缓存是否失效

        DB::transaction(function () use ($request, $cacheFormData, &$stepRunData) {
            //发起处理
            $stepRunData = $this->startSave($request, $cacheFormData['form_data']);
            //抄送人处理
            $this->cc->makeStepCc($cacheFormData,$stepRunData['current_step_run_data']);
            //流程开始回调
            $this->sendCallback->sendCallback($stepRunData['current_step_run_data']->id,'start');
            //步骤开始回调
            $stepRunData['next_step_run_data']->each(function ($stepRun) {
                $this->sendCallback->sendCallback($stepRun->id,'step_start');
            });
            //发送钉钉消息
            $this->sendMessage($stepRunData, $cacheFormData['is_cc']);
        });

        return $stepRunData;
    }

    /**
     * 检测发起、通过数据
     * @param $request
     */
    public function checkStartRequest($request, array $cacheData)
    {
        if (!empty($cacheData['available_steps'])) {
            //下一步审批人编号
            $availableStepStaffSn = array_map(function ($v) {
                return array_pluck($v['approvers'], 'staff_sn');
            }, $cacheData['available_steps']);
            $availableStepStaffSn = array_collapse($availableStepStaffSn);
            //检测提交的下一步审批人是否在审批人中
            foreach ($request->input('next_step') as $v) {
                if (!in_array($v['approver_sn'], $availableStepStaffSn)) {
                    abort(400, $v['approver_name'] . '不在下一步审批人中');
                }
            }
        }
    }

    /**
     * 发起保存
     * @param $request
     * @param $flow
     */
    protected function startSave($request, $formData)
    {
        $flowRunData = $this->createFlowRun();//创建流程运行数据
        $dataId = $this->createFormData($formData, $flowRunData);//创建表单data数据（表单与控件）
        $currentStepRunData = $this->createStartStepRunData($flowRunData, $dataId);//创建开始步骤运行数据
        $nextStepRunData = $this->createNextStepRunData($flowRunData, $dataId,$currentStepRunData, $request->input('next_step'));
        return [
            'flow_run' => $flowRunData,
            'current_step_run_data' => $currentStepRunData,//创建开始步骤数据
            'next_step_run_data' => $nextStepRunData//下一步骤运行数据
        ];
    }

    /**
     * 创建流程运行数据
     */
    protected function createFlowRun()
    {
        $flowData = Flow::select('id', 'id as flow_id', 'name', 'form_id', 'flow_type_id')->find($this->flowId);
        $flowData->creator_sn = Auth::id();
        $flowData->creator_name = Auth::user()->realname;
        $flowData->process_instance_id = date('YmdHis') . '-' . $flowData->id;;
        $data = FlowRun::create($flowData->toArray());
        return $data;
    }

    /**
     * 创建表单data
     * @param $flowRun
     */
    protected function createFormData(array $formData, $flowRun)
    {
        //创建表单data数据
        $formDataId = $this->createFormFieldsData($formData, $flowRun);
        //创建表单控件data数据
        $this->createFormGridFieldsData($formData, $flowRun, $formDataId);
        return $formDataId;
    }


    /**
     * 创建表单字段data数据
     * @param $formData
     * @param $flowRun
     * @return mixed
     */
    protected function createFormFieldsData(array $formData, $flowRun)
    {
        $formFieldsData = Field::where('form_id', $flowRun->form_id)->whereNull('form_grid_id')->get();
        $formFieldsKeys = $formFieldsData->pluck('key')->all();
        $formFieldsDataKeyBy = $formFieldsData->keyBy('key')->all();
        $formData = array_only($formData, $formFieldsKeys);
        $formData['run_id'] = $flowRun->id;
        foreach ($formData as $k => $v) {
            if (is_array($v)) {
                if ($v) {
                    $fieldType = $formFieldsDataKeyBy[$k]->type;
                    $newFieldValue = $this->setFieldTypeData($v, $fieldType, $k, $flowRun);
                    if ($fieldType == 'region') {
                        //地区级数
                        $regionLevel = $formFieldsDataKeyBy[$k]->region_level;
                        $regionKey = $formFieldsDataKeyBy[$k]->key;
                        switch ($regionLevel) {
                            case 1;
                                $formData[$regionKey . '_province_id'] = $v['province_id'];
                                break;
                            case 2;
                                $formData[$regionKey . '_province_id'] = $v['province_id'];
                                $formData[$regionKey . '_city_id'] = $v['city_id'];
                                break;
                            case 3;
                                $formData[$regionKey . '_province_id'] = $v['province_id'];
                                $formData[$regionKey . '_city_id'] = $v['city_id'];
                                $formData[$regionKey . '_county_id'] = $v['county_id'];
                                break;
                            case 4;
                                $formData[$regionKey . '_province_id'] = $v['province_id'];
                                $formData[$regionKey . '_city_id'] = $v['city_id'];
                                $formData[$regionKey . '_county_id'] = $v['county_id'];
                                $formData[$regionKey . '_address'] = $v['address'];
                                break;
                        }
                    } elseif ($fieldType == 'file') {
                        $v = $newFieldValue;
                    }
                }
                $formData[$k] = json_encode($v);
            }
        }

        $formDataId = DB::table($this->tablePrefix . $flowRun->form_id)->insertGetId($formData);
        return $formDataId;
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
    protected function setFieldTypeData(array $fieldValue, $fieldType, string $fieldKey, $flowRun, $gridKey = false)
    {
        switch ($fieldType) {
            case 'file':
                //文件处理
                $fieldValue = $this->moveTempFile($fieldValue);
                break;
            case 'staff':
                $this->makeFieldWidgetData($fieldValue, $fieldKey, $flowRun, $gridKey);
                break;
            case 'department':
                $this->makeFieldWidgetData($fieldValue, $fieldKey, $flowRun, $gridKey);
                break;
            case 'shop':
                $this->makeFieldWidgetData($fieldValue, $fieldKey, $flowRun, $gridKey);
                break;
        }
        return $fieldValue;
    }

    /**
     * 移动临时文件
     * @param $files
     * @return mixed
     */
    public function moveTempFile($files)
    {
        foreach ($files as $k => $file) {
            $files[$k] = $this->images->copyTempFile($file);
        }
        return $files;
    }

    /**
     * 员工、部门、店铺控件数据保存
     * @param $value
     */
    protected function makeFieldWidgetData(array $fieldValue, string $fieldKey, $flowRun, $gridKey)
    {
        $data = $fieldValue;
        if (count($data) == count($data, 1)) {
            //单选  一维数组
            $data['run_id'] = $flowRun->id;
        } else {
            //多选 二维数组
            data_fill($data, '*.run_id', $flowRun->id);
        }
        if ($gridKey) {
            //表单控件data控件
            $tableName = $this->tablePrefix . $flowRun->form_id . '_' . $gridKey . '_fieldType_' . $fieldKey;
        } else {
            //表单data控件
            $tableName = $this->tablePrefix . $flowRun->form_id . '_fieldType_' . $fieldKey;
        }

        DB::table($tableName)->insert($data);
    }

    /**
     * 创建表单控件data数据
     * @param array $formData
     * @param $flowRun
     * @param int $formDataId
     */
    protected function createFormGridFieldsData(array $formData, $flowRun, int $formDataId)
    {
        $gridData = FormGrid::where('form_id', $flowRun->form_id)->get();
        if ($gridData) {
            $gridDataKeyBy = $gridData->keyBy('key')->all();
            //控件key
            $gridKeys = $gridData->pluck('key')->all();
            $formGridsData = array_only($formData, $gridKeys);
            if ($formGridsData) {
                //表单控件有数据
                foreach ($formGridsData as $gridKey => $v) {
                    $gridFieldsData = $gridDataKeyBy[$gridKey]->fields;
                    $gridFieldsDataKeyBy = $gridFieldsData->keyBy('key')->all();
                    $gridFormData = $this->getGridFormData($gridKey, $v, $gridFieldsDataKeyBy, $flowRun, $formDataId);
                    DB::table($this->tablePrefix . $flowRun->form_id . '_' . $gridKey)->insert($gridFormData);
                }
            }
        }
    }

    /**
     * 获取表单控件data
     * @param string $gridKey
     * @param array $gridFormData
     * @param $gridFieldsDataKeyBy
     * @param $flowRun
     * @param int $formDataId
     * @return array
     */
    protected function getGridFormData(string $gridKey, array $gridFormData, $gridFieldsDataKeyBy, $flowRun, int $formDataId)
    {
        foreach ($gridFormData as $k => $item) {
            foreach ($item as $key => $value) {
                $gridFormData[$k]['run_id'] = $flowRun->id;
                $gridFormData[$k]['data_id'] = $formDataId;
                if (is_array($value)) {
                    if ($value) {
                        $fieldType = $gridFieldsDataKeyBy[$key]->type;
                        $newFieldValue = $this->setFieldTypeData($value, $fieldType, $key, $flowRun, $gridKey);
                        if ($fieldType == 'region') {
                            //地区级数
                            $regionLevel = $gridFieldsDataKeyBy[$key]->region_level;
                            $regionKey = $gridFieldsDataKeyBy[$key]->key;
                            switch ($regionLevel) {
                                case 1;
                                    $gridFormData[$k][$regionKey . '_province_id'] = $value['province_id'];
                                    break;
                                case 2;
                                    $gridFormData[$k][$regionKey . '_province_id'] = $value['province_id'];
                                    $gridFormData[$k][$regionKey . '_city_id'] = $value['city_id'];
                                    break;
                                case 3;
                                    $gridFormData[$k][$regionKey . '_province_id'] = $value['province_id'];
                                    $gridFormData[$k][$regionKey . '_city_id'] = $value['city_id'];
                                    $gridFormData[$k][$regionKey . '_county_id'] = $value['county_id'];
                                    break;
                                case 4;
                                    $gridFormData[$k][$regionKey . '_province_id'] = $value['province_id'];
                                    $gridFormData[$k][$regionKey . '_city_id'] = $value['city_id'];
                                    $gridFormData[$k][$regionKey . '_county_id'] = $value['county_id'];
                                    $gridFormData[$k][$regionKey . '_address'] = $value['address'];
                                    break;
                            }
                        } elseif ($fieldType == 'file') {
                            $value = $newFieldValue;
                        }
                    }
                    $gridFormData[$k][$key] = json_encode($value);
                }
            }
        }
        return $gridFormData;
    }

    /**
     * 创建开始步骤数据
     * @param $nextStep
     * @param $flowRun
     * @param $dataId
     */
    protected function createStartStepRunData($flowRun, int $dataId)
    {
        $flow = Flow::find($this->flowId);
        $flowRepository = new FlowRepository();
        $startStep = $flowRepository->getFlowFirstStep($flow);
        $column['step_id'] = $startStep->id;
        $column['step_key'] = $startStep->step_key;
        $column['step_name'] = $startStep->name;
        $column['flow_type_id'] = $flow->flow_type_id;
        $column['flow_id'] = $flow->id;
        $column['flow_name'] = $flow->name;
        $column['flow_run_id'] = $flowRun->id;
        $column['form_id'] = $flow->form_id;
        $column['data_id'] = $dataId;
        $column['approver_sn'] = Auth::id();
        $column['approver_name'] = Auth::user()->realname;
        $column['action_type'] = 1;
        $column['acted_at'] = date('Y-m-d H:i:s');
        $column['prev_id'] = [];
        $stepRunData = StepRun::create($column);
        return $stepRunData;
    }

    /**
     * 创建下一步骤运行数据
     * @param $flow
     * @param $flowRun
     * @param $dataId
     * @param $currentStepRunData
     * @param $nextStep
     */
    protected function createNextStepRunData($flowRun, int $dataId, $currentStepRunData,array $nextStep)
    {
        $flow = Flow::find($this->flowId);
        $nextStepRunData = [];//下一步骤运行数据
        foreach ($nextStep as $v) {
            $step = Step::find($v['step_id']);
            $column['step_id'] = $step->id;
            $column['step_key'] = $step->step_key;
            $column['step_name'] = $step->name;
            $column['flow_type_id'] = $flow->flow_type_id;
            $column['flow_id'] = $flow->id;
            $column['flow_name'] = $flow->name;
            $column['flow_run_id'] = $flowRun->id;
            $column['form_id'] = $flow->form_id;
            $column['data_id'] = $dataId;
            $column['approver_sn'] = $v['approver_sn'];
            $column['approver_name'] = $v['approver_name'];
            $column['action_type'] = 0;
            $column['prev_id'] = [$currentStepRunData->id];
            $column['next_id'] = [];
            $stepRunData = StepRun::create($column);
            $nextStepRunData[] = $stepRunData;
        }
        $nextStepRunData = collect($nextStepRunData);
        //下一步骤运行ID保存
        $currentStepRunData->next_id = $nextStepRunData->pluck('id')->all();
        $currentStepRunData->save();
        return $nextStepRunData;
    }

    /**
     * 发送钉钉消息
     * @param $stepRunData
     * @param $isCc
     */
    protected function sendMessage($stepRunData,int $isCc)
    {
        //表单Data
        $formData = $this->presetService->formRepository->getFormData($stepRunData['flow_run']);

        //流程是否发送通知
        $flowIsSendMessage = $stepRunData['current_step_run_data']->flow->send_message;
        //发送通知
        if (config('oa.is_send_message') && $flowIsSendMessage) {
            //允许流程发送通知

            //发送通知给审批人
            $stepRunData['next_step_run_data']->each(function ($stepRun) use ($formData) {
                if ($stepRun->steps->send_todo) {
                    //发送待办通知
                    $todoResult = $this->dingTalkMessage->sendTodoMessage($stepRun, $formData);
                    abort_if($todoResult == 0, 400, '发送待办通知失败');

                    //发送工作通知OA消息
                    $oaMsgResult = $this->dingTalkMessage->sendJobOaMessage($stepRun, $formData);
                    abort_if($oaMsgResult == 0, 400, '发送工作通知失败');
                    $stepRun->is_send_todo = 1;
                    $stepRun->save();
                }
            });

            //发送工作通知text消息 给发起人
            if ($stepRunData['current_step_run_data']->steps->send_start) {
                $content = '你已发起了' . $stepRunData['current_step_run_data']->flow_name . '的流程';
                $result = $this->dingTalkMessage->sendJobTextMessage($stepRunData['current_step_run_data'], $content);
                abort_if($result == 0, 400, '发送工作通知失败');
            }

            //发送抄送人通知
            //抄送人
            $ccPersons = request()->get('cc_person', []);
            //是否允许发送通知
            $isSend = $stepRunData['current_step_run_data']->steps->send_todo;
            if($isCc && $ccPersons && $isSend){
                array_map(function($staff)use($stepRunData,$formData){
                    $result = $this->dingTalkMessage->sendCcJobOaMessage($stepRunData['current_step_run_data'],$formData,$staff['staff_sn']);
                    abort_if($result == 0, 400, '发送抄送人工作通知失败');
                },$ccPersons);
            }
        }
    }
}