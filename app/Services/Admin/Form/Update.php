<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/1/001
 * Time: 11:19
 */

namespace App\Services\Admin\Form;


use App\Models\Field;
use App\Models\Flow;
use App\Models\Form;
use App\Models\FormGrid;
use Illuminate\Database\Eloquent\Collection;

trait Update
{
    public function updateForm($request)
    {
        $formDataTable = new FormDataTableService($request->id);
        $form = Form::find($request->id);
        if (empty($form))
            abort(404, '该表单不存在');
        if ($formDataTable->getFormDataCount() > 0) {
            //表单数据表含有数据
            $form->delete();
            $form = $this->create($request);//重新插入新数据
            Flow::where('form_id', $request->id)->update(['form_id' => $form->id]);//修改流程表的表单id
        } else {
            //表单数据表无数据
            $this->formDataIsNullUpdateSave($form, $request);
        }
        $this->updateStepFieldsKey($request);//修改步骤字段
        $data = Form::with(['fields.validator', 'grids.fields.validator'])->find($form->id);
        return $data;
    }

    /**
     * 表单数据表无数据进行编辑保存
     * @param $request
     */
    protected function formDataIsNullUpdateSave($formData, $request)
    {
        $formData->update($request->input());
        $this->gridDataUpdate($request, $formData);//修改列表控件
        $this->formFieldsUpdate($request);//表单字段数据修改
        $this->updateStepFieldsKey($request);//修改步骤字段
    }

    /**
     * 修改列表控件数据
     * @param $request
     * @param $fromData
     */
    protected function gridDataUpdate($request, $fromData)
    {
        if ($request->has('grids') && $request->grids) {
            $this->updateGrids($request);
        } else {
            $this->deleteGrids($fromData->id);
        }
    }

    /**
     * @param $request
     * 列表控件修改
     */
    protected function updateGrids($request)
    {
        $data = FormGrid::with('fields.validator')->where('form_id', $request->id)->get();
        if ($data) {
            $this->deleteFormGridsTable($data);//删除列表控件表
        }
        $gridId = [];
        $fieldsId = [];//控件所有的修改字段id
        $gridItemFieldUpdateId = [];
        foreach ($request->grids as $k => $v) {
            $v['sort'] = $k;
            if (isset($v['id']) && intval($v['id'])) {
                //编辑数据
                $gridId[] = $v['id'];
                $this->formGridDataUpdate($v);//表单控件数据修改
                $gridItemFieldUpdateId = $this->formGridsFieldsUpdate($v, $request->id);
                $formDataTable = new FormDataTableService($request->id);
                $formDataTable->createFormGridTable($v);//创建列表控件表
            } else {
                //新增数据
                $v['form_id'] = $request->id;
                $this->gridItemSave($v);
            }
            $fieldsId = array_collapse([$fieldsId, $gridItemFieldUpdateId]);
        }
        $this->deleteGridData($data, $gridId, $fieldsId);//删除多余的数据

    }

    /**
     * 删除列表控件表
     * @param $formId
     */
    protected function deleteFormGridsTable($formGridData)
    {
        foreach ($formGridData as $v) {
            $formDataTable = new FormDataTableService($v['form_id']);
            $formDataTable->destroyFormGridTable($v['key']);
            foreach($v->fields as $field){
                //删除表单字段控件表
                $formDataTable->destroyFormDataFieldTypeTable($field->key);
            }
        }
    }

    /**
     * 表单控件数据修改
     * @param $gridItem
     */
    protected function formGridDataUpdate($gridItem)
    {
        $formGridData = FormGrid::find($gridItem['id']);
        $formGridData->key = $gridItem['key'];
        $formGridData->save();
    }

    /**
     * 列表控件字段修改
     * @param $gridItem
     * @param $formId
     */
    protected function formGridsFieldsUpdate($gridItem, $formId)
    {
        $gridUpdateFieldsId = [];//编辑的控件id
        foreach ($gridItem['fields'] as $k => $v) {
            $v['sort'] = $k;
            $v['form_id'] = $formId;
            $v['form_grid_id'] = $gridItem['id'];
            if (isset($v['id']) && intval($v['id'])) {
                //编辑
                $gridUpdateFieldsId[] = $v['id'];
                $this->formGridFieldSave($v);
            } else {
                //新增
                $this->fieldsItemSave($v);//新增控件字段
            }
        }
        return $gridUpdateFieldsId;
    }

    protected function formGridFieldSave($fieldsItem)
    {
        $data = Field::find($fieldsItem['id']);
        $data->update($fieldsItem);
        $data->validator()->sync($fieldsItem['validator_id']);
        //部门、员工、店铺控件
        if (count($data->widgets) > 0) {
            $this->deleteWidgets($data);
        }
        if (array_has($fieldsItem, 'oa_id') && is_array($fieldsItem['oa_id']) && $fieldsItem) {
            $data->widgets()->createMany(array_map(function ($v) use ($data) {
                return [
                    'field_id' => $data->id,
                    'oa_id' => $v
                ];
            }, $fieldsItem['oa_id']));
        }
    }

    /**
     * 删除部门、员工、店铺控件
     * @param $field
     */
    protected function deleteWidgets($field)
    {
        $field->widgets->each(function ($widget) {
            $widget->delete();
        });
    }

    /**
     * 删除多余的控件数据
     * @param array $data
     * @param array $gridId
     * @param array $fieldId
     */
    protected function deleteGridData(Collection $data, array $gridId, array $fieldId)
    {
        foreach ($data as $k => $v) {
            if (!in_array($v['id'], $gridId)) {
                if ($v['fields']) {
                    foreach ($v['fields'] as $val) {
                        if ($val['validator']) {
                            $val->validator()->sync([]);
                        }
                        $val->delete();
                    }
                }
                $v->delete();
            } else {
                if ($v['fields']) {
                    foreach ($v['fields'] as $val) {
                        if (!in_array($val['id'], $fieldId)) {
                            if ($val['validator']) {
                                $val->validator()->sync([]);
                            }
                            $val->delete();
                        }
                    }
                }
            }
        }
    }

    /**
     * 删除列表控件相关数据
     * @param $formId
     */
    protected function deleteGrids($formId)
    {
        $formGridData = FormGrid::where('form_id', $formId)->get();
        if ($formGridData) {
            $formGridId = $formGridData->pluck('id')->all();//控件id
            $this->deleteFormGridsTable($formGridData);//删除列表控件表
            $this->deleteFormGridsFields($formGridId, $formId);//删除控件字段
            $this->deleteFormGridData($formGridData);//删除表单控件数据
        }
    }

    /**
     * 删除控件字段
     * @param array $formGridId
     * @param $formId
     */
    protected function deleteFormGridsFields(array $formGridId, $formId)
    {
        $fieldData = Field::where('form_id', $formId)->whereIn('form_grid_id', $formGridId)->get();
        foreach ($fieldData as $v) {
            $v->validator()->sync([]);
            $v->delete();
        }
    }

    /**
     * /删除表单控件数据
     * @param $formGridData
     */
    protected function deleteFormGridData($formGridData)
    {
        foreach ($formGridData as $v) {
            $v->delete();
        }
    }

    /**
     * @param $request
     * 表单字段数据修改
     */
    protected function formFieldsUpdate($request)
    {
        $formDataTable = new FormDataTableService($request->id);
        $editIdArray = [];
        $fieldData = Field::where('form_id', $request->id)->whereNull('form_grid_id')->get();
        $fieldId = $fieldData->pluck('id')->all();

        //删除表单字段控件表
        foreach ($fieldData as $field) {
            $formDataTable->destroyFormDataFieldTypeTable($field->key);
        }

        foreach ($request->input('fields') as $k => $v) {
            $v['sort'] = $k;
            if (isset($v['id']) && intval($v['id'])) {
                $editIdArray[] = $v['id'];
                $field = Field::find($v['id']);
                $field->update($v);
                $field->validator()->sync(array_get($v, 'validator_id'));

            } else {
                $v['form_id'] = $request->id;
                $field = Field::create($v);
                $field->validator()->sync(array_get($v, 'validator_id'));
            }

            //部门、员工、店铺控件
            if (count($field->widgets) > 0) {
                $this->deleteWidgets($field);
            }
            $field->widgets()->createMany(array_map(function ($v) use ($field) {
                return [
                    'field_id' => $field->id,
                    'oa_id' => $v
                ];
            }, $v['oa_id']));
        }

        $deleteId = array_diff($fieldId, $editIdArray);
        Field::whereIn('id', $deleteId)->delete();

        $formDataTable->updateFormDataTable();//修改表单数据表字段
    }

    /*------------------------修改流程的步骤表的隐藏、可写、必填字段start------------------*/
    /**
     *
     * 修改步骤表的字段key
     * @param $request
     */
    protected function updateStepFieldsKey($request)
    {
        $fields = $this->getFieldsKey($request->id);//表单字段与列表控件字段
        $flowStepsFieldsData = $this->getStepFields($request->id);//流程步骤字段数据
        if ($flowStepsFieldsData)
            $this->updateStepFields($flowStepsFieldsData, $fields);
    }

    /**
     * 修改步骤的字段
     * @param $data
     * @param $fields
     */
    protected function updateStepFields($data, $fields)
    {
        foreach ($data as $v) {
            foreach ($v->steps as $item) {
                if ($item->hidden_fields) {
                    $newField = $this->checkFields($item->hidden_fields, $fields);
                    $item->hidden_fields = $newField;
                    $item->save();
                }
                if ($item->editable_fields) {
                    $newField = $this->checkFields($item->editable_fields, $fields);
                    $item->editable_fields = $newField;
                    $item->save();
                }
                if ($item->required_fields) {
                    $newField = $this->checkFields($item->required_fields, $fields);
                    $item->required_fields = $newField;
                    $item->save();
                }
            }
        }
    }

    protected function checkFields($fieldData, $fields)
    {
        $newField = [];
        foreach ($fieldData as $v) {
            if (in_array($v, $fields)) {
                $newField[] = $v;
            }
        }
        return $newField;
    }

    /**
     * 获取表单字段与列表控件字段
     * @param $formId
     */
    protected function getFieldsKey($formId)
    {
        $formDataTable = new FormDataTableService($formId);
        $formFieldsKeys = $formDataTable->getFormFields()->pluck('key')->all();
        //获取控件字段
        $gridData = FormGrid::with('fields')->where('form_id',$formId)->get();
        if ($gridData) {
            foreach ($gridData as $v) {
                foreach ($v->fields as $item) {
                    $formFieldsKeys[] = $v['key'] . '.*.' . $item['key'];
                }
            }
        }
        return $formFieldsKeys;
    }

    /**
     * 获取步骤的字段
     * @param $formId
     */
    protected function getStepFields($formId)
    {
        $data = Flow::with(['steps' => function ($query) {
            $query->whereNull('deleted_at')
                ->select('id', 'flow_id', 'hidden_fields', 'editable_fields', 'required_fields');
        }])
            ->where(['form_id' => $formId])
            ->whereNull('deleted_at')
            ->select('id', 'form_id')
            ->get();
        return $data;
    }

    /*------------------------修改流程的步骤表的隐藏、可写、必填字段start------------------*/
}