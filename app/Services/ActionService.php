<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/14/014
 * Time: 17:47
 */

namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ActionService
{
    use Through;

//    protected $user;
//
//    public function __construct()
//    {
//        $this->user = Auth::user();
//    }

    /**
     * 预提交处理
     * @param $request
     * @param $flow
     */
    public function preset($request, $flow)
    {
        DB::transaction(function () use ($request, $flow) {
            //创建流程运行数据
            $flowRunData = $this->createFlowData($flow->id);
            //创建表单data字段数据与控件字段数据
            $dataId = $this->createFormData($request->form_data, $flowRunData, $flow);
            //创建步骤运行数据
            $this->createStartStepRunData($flow,$flowRunData,$dataId);
        });
    }

    /**
     * 创建流程运行数据
     * @param $flowId
     */
    private function createFlowData($flowId)
    {
        return app('flowRun')->create($flowId);
    }

    /**
     * 创建表单data字段数据与控件字段数据
     * @param $request
     */
    private function createFormData($formData, $flowRunData, $flowModel)
    {
        $dataId = $this->createFormFieldsData($formData, $flowRunData, $flowModel);//创建表单data字段数据
        $this->createGridFieldsData($formData, $flowRunData, $flowModel,$dataId);//创建表单控件字段数据
        return $dataId;
    }

    /**
     * 创建表单data数据
     * @param $formData
     * @param $flowRunData
     * @param $flowModel
     * @return mixed
     */
    private function createFormFieldsData($formData, $flowRunData, $flowModel)
    {
        //获取表单字段
        $formFields = $flowModel->form->fields->filter(function ($field) {
            return $field->form_grid_id == null;
        })->pluck('key')->all();
        $formFieldsData = array_only($formData, $formFields);
        $formFieldsData['run_id'] = $flowRunData->id;
        $id = app('formData', ['formId' => $flowRunData->form_id])->create($formFieldsData);//创建表单data数据
        return $id;
    }

    /**
     * 创建表单控件数据
     * @param $formData
     * @param $flowRunData
     * @param $flowModel
     */
    private function createGridFieldsData($formData, $flowRunData, $flowModel,$dataId)
    {
        $gridFields = $flowModel->form->grid->load('fields')->keyBy('key');//获取表单控件字段数据
        $gridKeys= $gridFields->pluck('key')->all();//控件的key
        foreach ($formData as $k=>$v){
           if(in_array($k,$gridKeys)){
               //包含控件
               $v =data_fill($v,'*.run_id',$flowRunData->id);//添加运行id字段数据
               $v = data_fill($v,'*.data_id',$dataId);//添加dataID
               app('formData',['formId'=>$flowRunData->form_id])->createGrid($v,$k);
//                $itemFields = $gridFields[$k]['fields']->pluck('key')->all();//单个控件字段
           }
        }
    }

    /**
     * 创建开始步骤运行数据
     */
    private function createStartStepRunData($flowModel, $flowRunData, $formDataId)
    {
        $startStepData = app('step')->getStartStepData($flowModel);
        app('stepRun')->createStartStepRun($startStepData, $flowRunData, $formDataId);
    }


    /*---------------------------------------------------------------------------*/
    /**
     * 流程发起处理
     * @param $request
     */
    public function start($request)
    {
        DB::transaction(function () use ($request) {
            $flowRunData = $this->createFlowData($request->flow_id);
            $formDataId = $this->createFormData($request, $flowRunData);
            $this->createStartStepRunData($request->flow_id, $flowRunData, $formDataId);
            $this->createNextStepRunData($request, $flowRunData, $formDataId);
        });
    }

    /**
     * 获取该流程的当前人数据
     * @param $request
     */
    public function getCurrentUserStepData($flowId)
    {
//        dd(app('auth')->user());
        return app('stepRun')->getCurrentUserStepData($flowId);
    }

    /**
     * 通过
     * @param $request
     */
    public function through($request)
    {
        DB::transaction(function () use ($request) {
            $stepRunData = $this->saveThrough($request);//修改为通过状态
            if ($request->has('form_data') && $request->form_data)
                app('formData', ['formId' => $stepRunData->form_id])->update($stepRunData->data_id, $request->form_data);//修改表单data表数据
            $isOverFlow = $this->checkNextStep($stepRunData);//检测是否为结束流程并进行处理
            if ($isOverFlow == false) {//步骤未结束
//                $this->throughCreateNextStepRunData($request,$stepRunData);
                $flowRunData = app('flowRun')->find($stepRunData->flow_run_id);//获取流程运行数据
                $this->createNextStepRunData($request, $flowRunData, $stepRunData->form_id);//创建下一步骤运行数据
            }
        });
    }



    /**
     * 创建下一运行步骤数据
     * @param $request
     * @param $flowRunData
     * @param $formDataId
     */
    private function createNextStepRunData($request, $flowRunData, $formDataId)
    {
        foreach ($request->approvers as $k => $v) {
            $stepData = app('step')->getStep($request->flow_id, $v['step_key']);
            app('stepRun')->createStepRun($stepData, $flowRunData, $formDataId, $v);
        }
    }

}