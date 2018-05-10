<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/12/012
 * Time: 16:21
 */

namespace App\Services;


use App\Models\FormGrid;
use Illuminate\Support\Facades\DB;

class FormDataService
{

    protected $tableName;
    protected $formId;

    public function __construct($formId)
    {
        $this->formId = $formId;
        $this->tableName = 'form_data_' . $formId;
    }

    /**
     * 创建表单data数据
     * @param $data
     */
    public function create($data)
    {
        return DB::table($this->tableName)->insertGetId($data);
    }

    /**
     * 创建控件数据
     * @param $data
     * @param $gridKey
     */
    public function createGrid($data,$gridKey){
        $tableName = $this->tableName.'_'.$gridKey;
        DB::table($tableName)->insert($data);
    }

    /**
     * 获取表单字段data数据与控件字段数据
     * @param $runId
     */
    public function getFormData($runId)
    {
//        DB::table()
    }

    /*--------------------------------------*/
    /**
     * 获取当前表单data数据
     * @param $id
     */
    public function find($id)
    {
        return DB::table($this->tableName)->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        DB::table($this->tableName)->where('id', $id)->update($data);
    }


    public function getGridData()
    {

    }

    /**
     * 获取表单控件
     * @return mixed
     */
    protected function getFormGridData()
    {
        return FormGrid::where('form_id',$this->formId)->get();
    }
}