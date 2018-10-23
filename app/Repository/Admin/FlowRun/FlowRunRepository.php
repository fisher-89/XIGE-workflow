<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22/022
 * Time: 16:17
 */

namespace App\Repository\Admin\FlowRun;


use App\Models\FlowRun;
use App\Repository\Web\FormRepository;
use Illuminate\Support\Facades\DB;

class FlowRunRepository
{
    protected $formRepository;

    public function __construct(FormRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

    /**
     * 获取列表
     * @return mixed
     */
    public function getIndex()
    {
        $data = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        return $data;
    }

    public function getExportData()
    {
        $flowRun = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        //获取表单data数据
        $formId = $flowRun[0]->form_id;
        $flowRunIds = $flowRun->pluck('id')->all();
        $formData = DB::table('form_data_' . $formId)->whereIn('run_id', $flowRunIds)->get();
        $newFormData = [];
        foreach($formData as $k=>$v){
            foreach($v as $field=>$value){
                if($value){
                    $newValue = json_decode($value,true);
                    if(is_array($newValue) && $newValue && !is_null($value)){
                        if(count($newValue) == count($newValue,1)){
                            if(array_has($newValue,'text')){
                                $value = $newValue['text'];
                            }else{
                                $value = implode(',',$newValue);
                            }
                        }else{
                            $value = implode(',',array_pluck($newValue,'text'));
                        }
                    }elseif(is_array($newValue) && count($newValue)==0){
                        $value = '';
                    }
                }else{
                    $value = '';
                }
                $newFormData[$k][$field] = $value;
            }
        }
        dd($newFormData);
        //表单字段
        $fields = $this->formRepository->getFields($formId);
        $headers = $fields['form']->map(function ($field) use ($formData) {
            $index = $field->key;
            $title = $field->name;
            return ['dataIndex' => $index, 'title' => $title];

        })->all();
        return [
            'data' => $formData,
            'headers' => $headers
        ];
    }
}