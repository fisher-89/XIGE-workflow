<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24/024
 * Time: 14:14
 *
 *部门、员工、店铺控件
 */

namespace App\Repository\Web;


use App\Models\Field;
use App\Models\FieldUserWidget;
use App\Services\OA\OaApiService;
use function GuzzleHttp\Psr7\build_query;

class WidgetRepository
{
    protected $oaApiSerivce;

    public function __construct(OaApiService $oaApiService)
    {
        $this->oaApiSerivce = $oaApiService;
    }

    /**
     * 获取员工数据
     * @param $request
     */
    public function getStaff($request)
    {
        if ($request->has('field_id') && $request->field_id) {
            //表单字段选人控件

            $fieldData = Field::find($request->field_id);
            if (count($fieldData->widgets) > 0) {
                //含有员工的权限
                $filters = 'filters=staff_sn=[' . implode(',', $fieldData->widgets->pluck('oa_id')->all()) . ']';
                if (!empty($fieldData->condition))
                    $filters .= ';' . $fieldData->condition;

                //请求筛选
                if ($request->has('filters')) {
                    $filters .= ';' . $request->query('filters');
                }
                $query = $request->except(['field_id', 'filters']);
                if (!empty($query)) {
                    $filters .= '&' . http_build_query($query);
                }
                $data = $this->oaApiSerivce->getStaff($filters);

            } else {
                //全部员工
                $data = $this->getDepartmentUser($request);
            }
        } else {
            //全部员工
            $data = $this->getDepartmentUser($request);
        }
        return $data;
    }

    /**
     * 获取部门员工
     * @param $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    protected function getDepartmentUser($request)
    {
        if ($request->has('filters') && $request->filters) {
            //搜索
            $filters = 'filters='.$request->filters;
            $query = $request->except(['field_id', 'filters']);
            if (!empty($query)) {
                $filters .= '&' .http_build_query($query);
            }
            $data = $this->oaApiSerivce->getStaff($filters);
        } else {
            if ($request->has('department')) {
                //选择部门
                $data = $this->oaApiSerivce->getDepartmentUser($request->query('department'));
            } else {
                //父级部门
                $filters = 'filters=parent_id=0';
                $data = $this->oaApiSerivce->getDepartments($filters);
            }
        }
        return $data;
    }

    public function getDepartment($request)
    {
        if ($request->has('field_id') && $request->field_id) {
            $fieldData = Field::find($request->field_id);
            dd($fieldData->toArray());
        } else {

        }
    }
}