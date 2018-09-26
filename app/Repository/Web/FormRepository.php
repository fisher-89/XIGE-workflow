<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14/014
 * Time: 17:17
 */

namespace App\Repository\Web;


use App\Models\Field;
use App\Models\FlowRun;
use App\Models\FormGrid;
use App\Services\Web\FormDataService;
use Illuminate\Support\Facades\DB;

class FormRepository
{
    /**
     * 获取全部字段（包含控件）
     * @param $formId
     * @return array
     */
    public function getFields($formId)
    {
        $formFields = Field::where('form_id', $formId)->whereNull('form_grid_id')->orderBy('sort', 'asc')->get();
        //控件data与控件字段
        $gridDataFields = $this->getGridData($formId);
        //控件字段添加表单data默认值
        if (!empty($gridDataFields))
            $gridDataFields = $this->addDefaultValueToGridDataField($gridDataFields);
        $allFields = ['form' => $formFields, 'grid' => $gridDataFields];
        return collect($allFields);
    }

    /**
     * 获取表单控件数据与控件字段
     * @param $formId
     */
    public function getGridData($formId)
    {
        $gridData = FormGrid::with(['fields' => function ($query) {
            $query->orderBy('sort', 'asc');
        }])->whereFormId($formId)->get();
        return $gridData;
    }

    /**
     * 表单控件字段数据添加表单默认值
     * @param $gridDataFields
     * @return mixed
     */
    protected function addDefaultValueToGridDataField($gridDataFields)
    {
        $formDataService = new FormDataService();

        $newGridDataFields = $gridDataFields->map(function ($gridItem) use ($formDataService) {
            $gridFieldData = [];
            $gridItem->fields->map(function ($field) use (&$gridFieldData, $formDataService) {
                $gridFieldData[$field->key] = $formDataService->getFormDataDefaultValue($field);
            });
            $gridItem->field_default_value = $gridFieldData;
            return $gridItem;
        });
        return $newGridDataFields;
    }

    /**
     * 获取表单data数据与控件数据
     * @param $flowRun
     */
    public function getFormData($flowRun = null)
    {
        if ($flowRun == null) {//第一步骤无表单data数据
            $formData = [];
        } else {
            if (is_numeric($flowRun)) {
                $flowRun = FlowRun::find($flowRun);
            }
            $gridKeys = $this->getGridData($flowRun->form_id)->pluck('key')->all();
            $formData = $this->getDbFormFieldsData($flowRun, $gridKeys);
        }
        return (array)$formData;
    }

    /**
     * 获取数据库表单data数据
     * @param $flowRun
     * @return mixed
     */
    protected function getDbFormFieldsData($flowRun, array $gridKeys)
    {
        $tableName = 'form_data_' . $flowRun->form_id;
        $runId = $flowRun->id;
        $formData = (array)DB::table($tableName)->whereRunId($runId)->first();
        $fields = $this->getFields($flowRun->form_id);

        //json字符串转数组
        $formData = $this->dbFormJsonDataToArray($formData, $fields['form']);

        //表单控件数据
        if (!empty($gridKeys)) {
            $gridDataKeyBy = $fields['grid']->keyBy('key')->all();
            foreach ($gridKeys as $key) {
                $gridFields = $gridDataKeyBy[$key]->fields;
                $formData[$key] = DB::table($tableName . '_' . $key)->where('data_id', $formData['id'])
                    ->get()->map(function ($item) use($gridFields){
                        $item =  (array)$item;
                        return $this->dbFormJsonDataToArray($item,$gridFields);
                    })->toArray();
            }
        }
        return $formData;
    }

    /**
     *
     * @param array $formData
     * @param int $formId
     */
    protected function dbFormJsonDataToArray(array $formData, $formField)
    {
        $fieldKeys = $formField->pluck('key')->all();
        $formField = $formField->keyBy('key');
        foreach ($formData as $k => $v) {
            if (in_array($k, $fieldKeys)) {
                $type = $formField[$k]->type;
                if($v){
                    switch ($type) {
                        case 'array':
                                $formData[$k] = json_decode($v, true);
                            break;
                        case 'select':
                                $formData[$k] = json_decode($v, true);
                            break;
                        case 'file':
                                $formData[$k] = json_decode($v, true);
                            break;
                        case 'department':
                            $formData[$k] = json_decode($v, true);
                            break;
                        case 'staff':
                            $formData[$k] = json_decode($v, true);
                            break;
                        case 'shop':
                            $formData[$k] = json_decode($v, true);
                            break;
                        case 'region':
                            $formData[$k] = json_decode($v, true);
                            break;
                    }
                }
            }
        }
        return $formData;
    }
    /*---------------------------------end------------------------------------------------*/
    /**
     * 获取去除hidden的字段
     * @param $hiddenFields
     * @param $formId
     */
//    public function getExceptHiddenFields($hiddenFields, $formId)
//    {
//        $allFields = $this->getFields($formId);//获取全部字段
//        $fields = $this->exceptHiddenFields($allFields, $hiddenFields);//去除了隐藏的字段
//        return $fields;
//    }


    /**
     * 获取editable的字段信息
     * @param $editableFields
     * @param $formId
     */
//    public function getOnlyEditableFields($editableFields, $formId)
//    {
//        $allFields = $this->getFields($formId);//获取全部字段
//        $fields = $this->onlyEditableFields($allFields, $editableFields);//包含可写的字段
//        return $fields;
//    }


    /**
     * 替换表单的formData数据
     * @param $requestFormData
     * @param $databaseFormData
     */
    public function replaceFormData($requestFormData, $databaseFormData)
    {
        foreach ($databaseFormData as $k => $v) {
            if (array_has($requestFormData, $k)) {
//                if (is_array($v)) {
//                    if (count($v) > 0) {
//                        $databaseFormData[$k] = $this->replaceGridFormData($k, $v, $requestFormData);
//                    }
//                }
                $databaseFormData[$k] = $requestFormData[$k];
            }
        }
        return $databaseFormData;
    }

    /**
     * 替换控件数据
     * @param $gridData
     * @param $requestFormData
     * @return mixed
     */
//    protected function replaceGridFormData($gridDataKey, $gridData, $requestFormData)
//    {
//        foreach ($gridData as $gridKey => $gridItem) {
//            foreach ($gridItem as $field => $value) {
//                if (array_has($requestFormData[$gridKey], $field)) {
//                    $gridData[$gridKey][$field] = $requestFormData[$gridKey][$field];
//                }
//            }
//        }
//        return $gridData;
//    }



    /**
     * 获取表单的文件字段
     * @param $fields
     * @return mixed
     */
    protected function getFormDataFileFields($fields)
    {
        $fields['form'] = $fields['form']->filter(function ($field) {
            return $field['type'] == 'file';
        })->pluck('key');
        if (!empty($fields['grid'])) {
            $fields['grid'] = $fields['grid']->map(function ($grid) {
                $gridData = $grid->toArray();
                $gridData['fields'] = $grid->fields->filter(function ($filed) {
                    return $filed->type == 'file';
                })->pluck('key');
                return collect($gridData);
            })->pluck('fields', 'key');
        }
        return $fields->toArray();
    }


    /**
     * 去除hidden字段
     * @param $allFields
     * @param $hiddenFields
     */
//    protected function exceptHiddenFields($allFields, $hiddenFields)
//    {
//        //去除表单的hidden字段
//        $allFields['form'] = $allFields['form']->filter(function ($field) use ($hiddenFields) {
//            return !in_array($field->key, $hiddenFields);
//        })->pluck([]);
//
//        //去除控件的hidden字段
//        $allFields['grid'] = $allFields['grid']->map(function ($grid) use ($hiddenFields) {
//            $gridKey = $grid->key;
//            $fields = $grid->fields->filter(function ($field) use ($gridKey, $hiddenFields) {
//                $key = $gridKey . '.*.' . $field->key;
//                return !in_array($key, $hiddenFields);
//            })->pluck([]);
//            $gridData = $grid->toArray();
//            $gridData['fields'] = $fields;
//            return collect($gridData);
//        });
//        return collect($allFields);
//    }

    /**
     * 获取包含可写的字段信息
     * @param $allFields
     * @param $editableFields
     * @return mixed
     */
//    protected function onlyEditableFields($allFields, $editableFields)
//    {
//        $allFields['form'] = $allFields['form']->filter(function ($field) use ($editableFields) {
//            return in_array($field->key, $editableFields);
//        })->pluck([]);
//        $allFields['grid'] = $allFields['grid']->map(function ($grid) use ($editableFields) {
//            $gridKey = $grid->key;
//            $fields = $grid->fields->filter(function ($field) use ($gridKey, $editableFields) {
//                $key = $gridKey . '.*.' . $field->key;
//                return in_array($key, $editableFields);
//            })->pluck([]);
//            $gridData = $grid->toArray();
//            $gridData['fields'] = $fields;
//            return collect($gridData);
//        });
//        return $allFields;
//    }
}