<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/27/027
 * Time: 15:12
 */

namespace App\Services;


use App\Models\Field;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\FormGrid;
use App\Models\Step;
use App\Models\StepRun;
use App\Repository\FlowRepository;
use App\Repository\FormRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StartService
{
    protected $user;
    protected $tablePrefix = 'form_data_';//表单data表名前缀
    protected $flowId;//流程ID

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * 发起保存
     * @param $request
     * @param $flow
     */
    public function startSave($request, $flow)
    {
        $this->flowId = $flow->id;
        $flowRunData = [];
        DB::transaction(function () use ($request, $flow,&$flowRunData) {
            $flowRunData = $this->createFlowRun($flow->id);//创建流程运行数据
            $dataId = $this->createFormData($request, $flowRunData);//创建表单data数据（表单与控件）
            $this->createStartStepRunData($flow, $flowRunData, $dataId);//创建开始步骤运行数据
            $this->createNextStepRunData($flow, $flowRunData, $dataId, $request->input('next_step'));
        });
        return $flowRunData;
    }

    /**
     * 创建流程运行数据
     */
    protected function createFlowRun($flowId)
    {
        $flowData = Flow::select('id as flow_id', 'name', 'form_id','flow_type_id')->find($flowId);
        $flowData->creator_sn = $this->user->staff_sn;
        $flowData->creator_name = $this->user->realname;
        $data = FlowRun::create($flowData->toArray());
        return $data;
    }

    /**
     * 创建表单data
     * @param $flowRun
     */
    protected function createFormData($request, $flowRun)
    {
        $cacheFormData = app('preset')->getPresetData($request->input('timestamp'));
        $formData = $cacheFormData['form_data'];
        $formData = $this->updateFormDataFilePath($formData, $flowRun->form_id);//修改文件路径与移动临时文件
        $formDataId = $this->createFormFieldsData($formData, $flowRun);
        $this->createGridFieldsData($formData, $flowRun, $formDataId);
        return $formDataId;
    }

    /**
     * 修改文件路径与移动临时文件
     * @param $formData
     * @param $formId
     */
    protected function updateFormDataFilePath($formData, $formId)
    {
        $formRepository = new FormRepository();
        $fileFields = $formRepository->getFileFields($formId);;//获取文件字段
        return $this->fileFieldsReplace($formData,$fileFields);
    }

    /**
     * 获取表单的文件字段
     * @param $fields
     * @return mixed
     */
//    protected function getFormDataFileFields($fields)
//    {
//        $fields['form'] = $fields['form']->filter(function ($field) {
//            return $field['type'] == 'file';
//        })->pluck('key');
//        if (!empty($fields['grid'])){
//            $fields['grid'] = $fields['grid']->map(function ($grid) {
//                $gridData = $grid->toArray();
//                $gridData['fields'] = $grid->fields->filter(function($filed){
//                   return $filed->type == 'file';
//                })->pluck('key');
//                return collect($gridData);
//            })->pluck('fields','key');
//        }
//        return $fields->toArray();
//    }

    /**
     * 文件路径处理
     * @param $formData
     * @param $fileFields
     */
    protected function fileFieldsReplace($formData,$fileFields){
        foreach($formData as $k=>$v){
            if(in_array($k,$fileFields['form']) && !empty($v)){
                //表单文件字段
                $formData[$k] = $this->moveFile($v);
            }
            if(is_array($v)&& $v && array_has($fileFields['grid'],$k)){
                //控件文件字段处理
                foreach($v as $gridKey=>$gridValue){
                    foreach($gridValue as $field=>$value){
                        if(in_array($field,$fileFields['grid'][$k]) && !empty($value)){
                            $formData[$k][$gridKey][$field] = $this->moveFile($value);
                        }
                    }
                }
            }
        }
        return $formData;
    }

    protected function moveFile(array $filePath){
        $data = [];
        foreach ($filePath as $v){
            $data[] = $this->copyFile($v);
        }
        return json_encode($data);
    }

    protected function copyFile($filePath){
        $fileTemp = str_replace('/storage/','',$filePath);
        $sub = explode('.',$fileTemp);
        $thumbFileTemp =$sub[0].'_thumb.'.$sub[1];//缩略临时路径

        $checkFileTemp =Storage::disk('public')->exists($fileTemp);
        $checkThumbFileTemp =Storage::disk('public')->exists($thumbFileTemp);

        if(!$checkFileTemp){
            abort(404,$fileTemp.'该文件不存在');
        }
        if(!$checkThumbFileTemp){
            abort(404,$thumbFileTemp.'该缩略图不存在');
        }

        $newPath = 'uploads/perpetual/'.$this->flowId.'/'.date('Y').'/'.date('m').'/'.date('d').'/';

        if(!Storage::disk('public')->exists($newPath)){
            //无路径
            Storage::disk('public')->makeDirectory($newPath);
        }
        $filePermanent = str_replace('uploads/temporary/',$newPath,$fileTemp);
        if(!Storage::disk('public')->exists($filePermanent)){
            Storage::disk('public')->copy($fileTemp, $filePermanent);
        }

        $thumbFilePermanent = str_replace('uploads/temporary/',$newPath,$thumbFileTemp);
        if(!Storage::disk('public')->exists($thumbFilePermanent)){
            Storage::disk('public')->copy($thumbFileTemp, $thumbFilePermanent);
        }
        return '/storage/'.$filePermanent;
    }

    /**
     * 创建表单字段data数据
     * @param $formData
     * @param $flowRun
     * @return mixed
     */
    protected function createFormFieldsData($formData, $flowRun)
    {
        $formFields = Field::where('form_id', $flowRun->form_id)->whereNull('form_grid_id')->pluck('key')->all();
        $formData = array_only($formData, $formFields);
        $formData['run_id'] = $flowRun->id;
        $formDataId = DB::table($this->tablePrefix . $flowRun->form_id)->insertGetId($formData);
        return $formDataId;
    }

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

    /**
     * 创建开始步骤数据
     * @param $nextStep
     * @param $flowRun
     * @param $dataId
     */
    protected function createStartStepRunData($flow, $flowRun, $dataId)
    {
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
        $column['approver_sn'] = $this->user->staff_sn;
        $column['approver_name'] = $this->user->realname;
        $column['action_type'] = 1;
        StepRun::create($column);
    }

    /**
     * 创建下一步骤数据
     * @param $flow
     * @param $flowRun
     * @param $dataId
     * @param $nextStep
     */
    protected function createNextStepRunData($flow, $flowRun, $dataId, $nextStep)
    {
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
            StepRun::create($column);
        }
    }
}