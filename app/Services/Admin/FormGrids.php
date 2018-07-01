<?php

namespace App\Services\Admin;
use App\Models\FormGrid;

/**
 * 表单列表控件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/20/020
 * Time: 9:35
 */
trait FormGrids
{
    /**
     * 创建列表控件数据表
     * @param $gridItem
     */
    public function createFormGridsTable($gridItem)
    {
        $this->tableName = $this->tableName.'_'.$gridItem['key'];
        $gridFields = $this->analyticalFields($gridItem['fields']);//解析字段
        $gridFields[] = ['type'=>'int','key'=>'data_id','description'=>'表单dataId'];
        $this->createTable($gridFields);
    }

    /**
     * 获取该表单控件
     */
    public function getGridsFields(){
       return FormGrid::with('fields')->where('form_id',$this->formId)->get();
    }
}