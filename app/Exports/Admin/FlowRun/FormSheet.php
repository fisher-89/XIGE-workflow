<?php

namespace App\Exports\Admin\FlowRun;

use App\Models\Form;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormSheet implements FromCollection, WithTitle
{
//    use Exportable;
    private $formId;
    private $runIds;

    public function __construct(int $formId, array $runIds)
    {
        $this->formId = $formId;
        $this->runIds = $runIds;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->getData();
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function title(): string
    {
        $form = Form::withTrashed()->findOrFail($this->formId);
        $sheetName = $form->created_at->format('Y-m-d H时i分s秒');
        return $sheetName;
    }

    protected function getData()
    {
        $formData = DB::table('form_data_' . $this->formId)->whereIn('run_id', $this->runIds)->get();
        $header = $this->getExcelHeader($this->formId);
        $newFormData = [];
        foreach ($formData as $k => $v) {
            foreach ($v as $field => $value) {
                if (!in_array($field, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    if ($value) {
                        $newValue = json_decode($value, true);
                        if (is_array($newValue) && $newValue && !is_null($value)) {
                            if (count($newValue) == count($newValue, 1)) {
                                //一维数组
                                if (array_has($newValue, 'text')) {
                                    $value = $newValue['text'];
                                } elseif (array_has($newValue, ['province_id', 'city_id', 'county_id', 'address'])) {
                                    $regionFullName = $this->getRegionName($newValue['county_id']);
                                    $value = $regionFullName . $newValue['address'];
                                } elseif (array_has($newValue, ['province_id', 'city_id', 'county_id'])) {
                                    $value = $this->getRegionName($newValue['county_id']);
                                } elseif (array_has($newValue, ['province_id', 'city_id'])) {
                                    $value = $this->getRegionName($newValue['city_id']);
                                } elseif (array_has($newValue, ['province_id'])) {
                                    $value = $this->getRegionName($newValue['province_id']);
                                } else {
                                    $value = implode(',', $newValue);
                                }
                            } else {
                                //二维数组
                                $value = implode(',', array_pluck($newValue, 'text'));
                            }
                        } elseif (is_array($newValue) && count($newValue) == 0) {
                            $value = '';
                        }
                    } else {
                        $value = '';
                    }
                    $newFormData[$k][$field] = $value;
                }

            }
        }
        $data = array_collapse([[$header], $newFormData]);
        $data = collect($data);
        return $data;
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

    /**
     * 获取excel头
     * @param $formId
     * @return array
     */
    public function getExcelHeader($formId)
    {
        $columns = DB::select('show full columns from form_data_' . $formId);
        $columns = array_filter($columns, function ($column) {
            return !in_array($column->Field, ['id', 'created_at', 'updated_at', 'deleted_at']);
        });
        $header = array_pluck($columns, 'Comment');
        return $header;
    }
}
