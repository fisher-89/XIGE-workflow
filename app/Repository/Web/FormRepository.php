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
                    ->get()->map(function ($item) use ($gridFields) {
                        $item = (array)$item;
                        return $this->dbFormJsonDataToArray($item, $gridFields);
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
                if ($v) {
                    switch ($type) {
                        case 'array':
                            $formData[$k] = json_decode($v, true);
                            break;
                        case 'select':
                            $value = json_decode($v, true);
                            if (is_array($value) && !is_null($value)) {
                                $formData[$k] = $value;
                            } else {
                                $formData[$k] = $v;
                            }
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
                        case 'api':
                            $value = json_decode($v, true);
                            if (is_array($value) && !is_null($value)) {
                                $formData[$k] = $value;
                            } else {
                                $formData[$k] = $v;
                            }
                            break;
                    }
                }
            }
        }
        return $formData;
    }
}