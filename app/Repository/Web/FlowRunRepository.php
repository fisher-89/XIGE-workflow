<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5/005
 * Time: 16:21
 */

namespace App\Repository\Web;


use App\Models\FlowRun;
use App\Models\StepRun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FlowRunRepository
{
    protected $staffSn;

    public function __construct()
    {
        $this->staffSn = Auth::id();
    }

    /**
     * 获取发起列表
     * @param $request
     */
    public function getSponsor($request)
    {
        $status = $this->status($request->type);
        $data = FlowRun::with('stepRun')->where('creator_sn', $this->staffSn)
            //筛选流程状态
            ->whereIn('status', $status)
            //筛选流程
            ->when($request->has('flow_id') && intval($request->flow_id), function ($query) use ($request) {
                return $query->where('flow_id', $request->flow_id);
            })
            ->filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        //添加form_data数据
        if (array_has($data, 'data')) {
            $data['data'] = $this->getSponsorFormData(collect($data['data']));
        } else {
            $data = $this->getSponsorFormData($data);
        }
        return $data;
    }

    /**
     * 获取发起列表的表单data
     * @param $flowRunData
     * @return array
     */
    protected function getSponsorFormData($flowRunData)
    {
        return $flowRunData->map(function ($flowRun) {
            $tableName = 'form_data_' . $flowRun->form_id;
            $formData = (array)DB::table($tableName)->where('run_id', $flowRun->id)->first();
            $formRepository = new FormRepository();
            $fields = $formRepository->getFields($flowRun->form_id);
            //可展示的字段
            $formField= $fields['form']->filter(function ($field, $key) use ($formData) {
                return (in_array($field->type, ['int', 'text', 'date', 'datetime', 'time', 'select', 'shop', 'staff', 'department']) && ($field->is_checkbox == 0));
            });

            //表单键值处理
            $newFormData =[];
            $count = 0;
            $formField->map(function($field)use($formData,&$newFormData,&$count){
                $key = $field->name;
                $value = $formData[$field->key];
                if(!empty($value)){
                    $count = $count+1;
                    $newValue = json_decode($value, true);
                    if (is_array($newValue) && $newValue && !is_null($newValue)) {
                        $value = $newValue['text'];
                    }else if(empty($newValue)){
                        $value = '';
                    }
                    if($count<4){
                        $newFormData[] = [$key=>$value];
                    }
                }
            })->all();

            $flowRun->form_data = $newFormData;
            return $flowRun;
        });
    }

    /**
     * 发起详情
     * @param $flowRunId
     */
    public function getSponsorDetail($flowRunId)
    {
        $stepRun = StepRun::where(['flow_run_id' => $flowRunId, 'approver_sn' => $this->staffSn, 'action_type' => 1])->orderBy('id', 'desc')->first();
        $stepRunRepository = new StepRunRepository();
        $data = $stepRunRepository->getDetail($stepRun);
        return $data;
    }

    /**
     * 处理发起分类
     * @param $type
     */
    protected function status($type)
    {
        switch ($type) {
            case 'all'://全部
                $status = [0, 1, -2, -1];
                break;
            case 'processing'://进行中
                $status = [0];
                break;
            case 'finished'://已完成
                $status = [1];
                break;
            case 'withdraw'://撤回
                $status = [-2];
                break;
            case 'rejected'://驳回
                $status = [-1];
                break;
            default:
                $status = [];
        }
        return $status;
    }

}