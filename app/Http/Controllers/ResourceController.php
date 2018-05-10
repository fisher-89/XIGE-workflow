<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetStartRequest;
use App\Http\Requests\StartRequest;
use App\Http\Resources\StepResource;
use App\Models\Flow;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{

    /**
     * 获取可发起的流程
     * @return string
     */
    public function getFlowList()
    {
        return 'list';
    }

    /**
     * 获取发起数据
     * @param StartRequest $request
     * @return array
     */
    public function start(GetStartRequest $request, Flow $flow)
    {
        $flowData = $flow->toArray();//流程数据
        $formData = $flow->form->toArray();//表单数据
        $firstStepData = app('step')->getStartStepData($flow);//开始步骤数据
        //获取表单data字段数据与控件字段数据
        $formFieldsDBData = app('field')->getFormData($flow);
        //初始的表单字段数据
        $initFormFieldsData = app('field')->getRequestFormData($flow);
        //字段数据 包含表单字段与控件字段
        $formDataFields = app('field')->analysisDefaultValue($initFormFieldsData, $formFieldsDBData,$firstStepData);
        $data = [
            'flow' => $flowData,
            'form' => $formData,
            'step' => $firstStepData,
            'form_data' => $formDataFields,
        ];
        return $data;
    }

    /**
     * 获取表单字段与控件字段
     * @param Request $request
     * @param Flow $flow
     * @return mixed
     */
    public function getFields(Request $request,Flow $flow){
       return  app('field')->getFields($flow);
    }

}
