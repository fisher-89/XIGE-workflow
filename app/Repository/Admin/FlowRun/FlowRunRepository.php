<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22/022
 * Time: 16:17
 */

namespace App\Repository\Admin\FlowRun;


use App\Models\FlowRun;
use App\Models\Region;
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

    /**
     * 导出数据
     * @return array
     */
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
                if(!in_array($field,['id','run_id','created_at','updated_at','deleted_at'])){
                    if($value){
                        $newValue = json_decode($value,true);
                        if(is_array($newValue) && $newValue && !is_null($value)){
                            if(count($newValue) == count($newValue,1)){
                                //一维数组
                                if(array_has($newValue,'text')){
                                    $value = $newValue['text'];
                                }elseif(array_has($newValue,['province_id','city_id','county_id','address'])){
                                    $regionFullName = $this->getRegionName($newValue['county_id']);
                                    $value = $regionFullName.$newValue['address'];
                                }elseif(array_has($newValue,['province_id','city_id','county_id'])){
                                    $value = $this->getRegionName($newValue['county_id']);
                                }elseif(array_has($newValue,['province_id','city_id'])){
                                    $value = $this->getRegionName($newValue['city_id']);
                                }elseif(array_has($newValue,['province_id'])){
                                    $value = $this->getRegionName($newValue['province_id']);
                                }else{
                                    $value = implode(',',$newValue);
                                }
                            }else{
                                //二维数组
                                $value = implode(',',array_pluck($newValue,'text'));
                            }
                        }elseif(is_array($newValue) && count($newValue)==0){
                            $value = '';
                        }
                    }else{
                        $value = '';
                    }
                    $newFormData[$k][] = $value;
                }
            }
        }

        //表单字段
        $fields = $this->formRepository->getFields($formId);
        $headers = $fields['form']->map(function ($field) {
            $title = $field->name;
            return  $title;
        })->all();
        return [
            'data' => $newFormData,
            'headers' => $headers
        ];
    }

    /**
     * 获取地区长字段名称
     * @param $id
     * @return mixed
     */
    protected function getRegionName($id)
    {
        return Region::find($id)->full_name;
    }
}