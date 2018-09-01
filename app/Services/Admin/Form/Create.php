<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/31/031
 * Time: 15:25
 *
 *新增保存
 */

namespace App\Services\Admin\Form;


use App\Models\Field;
use App\Models\Form;
use App\Models\FormGrid;

trait Create
{
    /**
     * 表单新增
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $formData = Form::create($request->input());//表单数据保存
        $request->offsetSet('form_id', $formData->id);
        $this->fieldsSave($request);//表单字段数据保存
        if ($request->has('grids') && $request->grids) {
            $this->formGridsSave($request);//保存列表控件数据 并创建控件表
        }
        $formDataTable = new FormDataTableService($formData->id);
        $formDataTable->createFormDataTable();//创建表单data表
        return $formData;
    }
    /*------------------------------------表单字段保存start-----------------------------------------*/
    /**
     * 字段保存
     * @param $fields
     * @param $formId
     */
    protected function fieldsSave($request)
    {
        foreach ($request->input('fields') as $k => $v) {
            $v['form_id'] = $request->form_id;
            $v['sort'] = $k;
            $this->fieldsItemSave($v);
        }
    }

    /**
     * 单个字段保存
     * @param $fieldsItem
     * @param $formGridId
     * @param $formId
     */
    protected function fieldsItemSave($fieldsItem)
    {
        $fieldData = Field::create($fieldsItem);
        if (isset($fieldsItem['validator_id']) && !empty($fieldsItem['validator_id'])) {
            $fieldData->validator()->sync($fieldsItem['validator_id']);//字段验证数据保存
        }
        //员工、部门、店铺ID数据控件保存
        if (array_has($fieldsItem, 'oa_id') && is_array($fieldsItem['oa_id']) && $fieldsItem) {
            $fieldData->widgets()->createMany(array_map(function ($v) use ($fieldData) {
                return [
                    'field_id' => $fieldData->id,
                    'oa_id' => $v
                ];
            }, $fieldsItem['oa_id']));
        }
    }
    /*------------------------------------表单字段保存end-----------------------------------------*/

    /*------------------------------------表单控件字段保存start-----------------------------------------*/
    /**
     * 列表控件保存
     * @param $request
     * @param $formData
     */
    protected function formGridsSave($request)
    {
        foreach ($request->grids as $v) {
            $v['form_id'] = $request->form_id;
            $this->gridItemSave($v);
        }
    }

    /**
     * 单个控件的保存
     * @param $gridItem
     * @param $formId
     */
    protected function gridItemSave($gridItem)
    {
        $formGridData = FormGrid::create($gridItem);//保存控件数据
        $this->gridsFieldsSave($gridItem, $formGridData->id);//保存字段数据
        //创建表单data控件表
        $formDataTable = new FormDataTableService($gridItem['form_id']);
        $formDataTable->createFormGridTable($gridItem);
    }

    /**
     * 列表字段保存
     * @param $data
     */
    protected function gridsFieldsSave($gridItem, $formGridId)
    {
        foreach ($gridItem['fields'] as $k => $v) {
            $v['sort'] = $k;
            $v['form_grid_id'] = $formGridId;
            $v['form_id'] = $gridItem['form_id'];
            $this->fieldsItemSave($v);
        }
    }
    /*------------------------------------表单控件字段保存end-----------------------------------------*/
}