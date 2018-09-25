<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/27/027
 * Time: 15:12
 */

namespace App\Services\Web;


use App\Jobs\SendCallback;
use App\Models\Field;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\FormGrid;
use App\Models\Step;
use App\Models\StepRun;
use App\Repository\Web\FlowRepository;
use App\Repository\Web\FormRepository;
use App\Services\Web\File\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StartService
{
    protected $tablePrefix = 'form_data_';//表单data表名前缀
    protected $flowId;//流程ID
    //预提交
    protected $presetService;
    //文件处理
    protected $images;

    public function __construct(PresetService $presetService, Images $images)
    {
        $this->presetService = $presetService;
        $this->images = $images;
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
        $this->checkStartRequest($request, $cacheFormData);//检测审批人数据与step_run_id是否正确、缓存是否失效
        //发起处理
        $stepRunData = $this->startSave($request, $cacheFormData['form_data']);
        //流程开始回调
        SendCallback::dispatch($stepRunData['current_step_run_data']->id,'start');
        //步骤开始回调
        $stepRunData['next_step_run_data']->each(function($stepRun){
            SendCallback::dispatch($stepRun->id,'step_start');
        });
        //发送钉钉待办消息
        //@todo
        return $stepRunData;
    }

    /**
     * 检测发起数据
     * @param $request
     */
    protected function checkStartRequest($request, array $cacheData)
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
        DB::transaction(function () use ($request, $formData, &$currentStepRunData, &$nextStepRunData) {
            $flowRunData = $this->createFlowRun();//创建流程运行数据
            $dataId = $this->createFormData($formData, $flowRunData);//创建表单data数据（表单与控件）
            $currentStepRunData = $this->createStartStepRunData($flowRunData, $dataId);//创建开始步骤运行数据
            $nextStepRunData = $this->createNextStepRunData($flowRunData, $dataId, $request->input('next_step'));
        });
        return [
            'current_step_run_data' => $currentStepRunData,//创建开始步骤数据
            'next_step_run_data' => $nextStepRunData//下一步骤运行数据
        ];
    }

    /**
     * 创建流程运行数据
     */
    protected function createFlowRun()
    {
        $flowData = Flow::select('id', 'id as flow_id', 'name', 'form_id', 'flow_type_id', 'process_instance_id')->find($this->flowId);
        $flowData->creator_sn = Auth::id();
        $flowData->creator_name = Auth::user()->realname;
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
                        switch ($regionLevel) {
                            case 1;
                                $formData['province_id'] = $v['province_id'];
                                break;
                            case 2;
                                $formData['province_id'] = $v['province_id'];
                                $formData['city_id'] = $v['city_id'];
                                break;
                            case 3;
                                $formData['province_id'] = $v['province_id'];
                                $formData['city_id'] = $v['city_id'];
                                $formData['county_id'] = $v['county_id'];
                                break;
                            case 4;
                                $formData['province_id'] = $v['province_id'];
                                $formData['city_id'] = $v['city_id'];
                                $formData['county_id'] = $v['county_id'];
                                $formData['address'] = $v['address'];
                                break;
                        }
                    } elseif ($fieldType == 'file') {
                        $v = $newFieldValue;
                    }
                }
                $formData[$k] = json_encode($v);
            }
        }

        $formDataId = DB::table($this->tablePrefix . $flowRun->form_id)->insert($formData);
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
    protected function moveTempFile($files)
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
        $gridDataKeyBy = $gridData->keyBy('key')->all();
        if ($gridData) {
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
        $stepRunData = StepRun::create($column);
        return $stepRunData;
    }

    /**
     * 创建下一步骤运行数据
     * @param $flow
     * @param $flowRun
     * @param $dataId
     * @param $nextStep
     */
    protected function createNextStepRunData($flowRun,int $dataId, array $nextStep)
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
            $stepRunData = StepRun::create($column);
            $nextStepRunData[] = $stepRunData;
        }
        return collect($nextStepRunData);
    }
    /**
     * 修改文件路径与移动临时文件
     * @param $formData
     * @param $formId
     */
//    protected function updateFormDataFilePath($formData, $formId)
//    {
//        $formRepository = new FormRepository();
//        $fileFields = $formRepository->getFileFields($formId);;//获取文件字段
//        return $this->fileFieldsReplace($formData, $fileFields);
//    }


    /**
     * 文件路径处理
     * @param $formData
     * @param $fileFields
     */
//    protected function fileFieldsReplace($formData, $fileFields)
//    {
//        foreach ($formData as $k => $v) {
//            if (in_array($k, $fileFields['form']) && !empty($v)) {
//                //表单文件字段
//                $formData[$k] = $this->moveFile($v);
//            }
//            if (is_array($v) && $v && array_has($fileFields['grid'], $k)) {
//                //控件文件字段处理
//                foreach ($v as $gridKey => $gridValue) {
//                    foreach ($gridValue as $field => $value) {
//                        if (in_array($field, $fileFields['grid'][$k]) && !empty($value)) {
//                            $formData[$k][$gridKey][$field] = $this->moveFile($value);
//                        }
//                    }
//                }
//            }
//        }
//        return $formData;
//    }

//    protected function moveFile(array $filePath)
//    {
//        $data = [];
//        foreach ($filePath as $v) {
//            $data[] = $this->copyFile($v);
//        }
//        return json_encode($data);
//    }

//    protected function copyFile($filePath)
//    {
//        $fileTemp = str_replace('/storage/', '', $filePath);
//        $sub = explode('.', $fileTemp);
//        $thumbFileTemp = $sub[0] . '_thumb.' . $sub[1];//缩略临时路径
//
//        $checkFileTemp = Storage::disk('public')->exists($fileTemp);
//        $checkThumbFileTemp = Storage::disk('public')->exists($thumbFileTemp);
//
//        if (!$checkFileTemp) {
//            abort(404, $fileTemp . '该文件不存在');
//        }
//        if (!$checkThumbFileTemp) {
//            abort(404, $thumbFileTemp . '该缩略图不存在');
//        }
//
//        $newPath = 'uploads/perpetual/' . $this->flowId . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
//
//        if (!Storage::disk('public')->exists($newPath)) {
//            //无路径
//            Storage::disk('public')->makeDirectory($newPath);
//        }
//        $filePermanent = str_replace('uploads/temporary/', $newPath, $fileTemp);
//        if (!Storage::disk('public')->exists($filePermanent)) {
//            Storage::disk('public')->copy($fileTemp, $filePermanent);
//        }
//
//        $thumbFilePermanent = str_replace('uploads/temporary/', $newPath, $thumbFileTemp);
//        if (!Storage::disk('public')->exists($thumbFilePermanent)) {
//            Storage::disk('public')->copy($thumbFileTemp, $thumbFilePermanent);
//        }
//        return '/storage/' . $filePermanent;
//    }

    /**
     * 创建表单字段data数据
     * @param $formData
     * @param $flowRun
     * @return mixed
     */
//    protected function createFormFieldsData($formData, $flowRun)
//    {
//        $formFields = Field::where('form_id', $flowRun->form_id)->whereNull('form_grid_id')->pluck('key')->all();
//        $formData = array_only($formData, $formFields);
//        $formData['run_id'] = $flowRun->id;
//        //类型为数组的值转为json
////        $formData = array_map(function($v){
////            if(is_array($v)){
////                $v = json_encode($v);
////            }
////            return $v;
////        },$formData);
//        $formDataId = DB::table($this->tablePrefix . $flowRun->form_id)->insertGetId($formData);
//        return $formDataId;
//    }

    /**
     * 创建控件data数据
     * @param $formData
     * @param $flowRun
     * @param $dataId
     */
    protected function createGridFieldsData($formData, $flowRun, $dataId)
    {
        $gridKeys = FormGrid::where('form_id', $flowRun->form_id)->pluck('key')->all();//控件key
        foreach ($formData as $key => $field) {
            if (is_array($field) && in_array($key, $gridKeys)) {
                $field = data_fill($field, '*.run_id', $flowRun->id);
                $field = data_fill($field, '*.data_id', $dataId);
                DB::table($this->tablePrefix . $flowRun->form_id . '_' . $key)->insert($field);
            }
        }
    }

}