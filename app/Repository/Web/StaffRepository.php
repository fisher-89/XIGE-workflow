<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/9/009
 * Time: 15:25
 */

namespace App\Repository\Web;


use App\Models\Field;
use App\Services\OA\OaApiService;

class StaffRepository
{

    protected $oaApiSerivce;

    public function __construct()
    {
        $this->oaApiSerivce = new OaApiService();
    }

    /**
     * 获取员工数据
     * @param $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getUser($request)
    {
        if ($request->has('field_id') && $request->field_id) {
            //表单字段选人
            $data = $this->getFormFieldChooseUser($request);
        } else {
            $data = $this->getDepartmentUser($request);
        }
        return $data;
    }

    /**
     * 表单字段选人
     * @param $request
     */
    protected function getFormFieldChooseUser($request)
    {
        $data['children'] = [];
        $data['staff'] = [];
        $fieldData = Field::find($request->field_id);
        if (count($fieldData->widgets) > 0) {
            //含有员工的权限
            $filters = 'filters=staff_sn=[' . implode(',', $fieldData->widgets->pluck('value')->all()) . ']';
            if (!empty($fieldData->condition))
                $filters .= ';' . $fieldData->condition;

            //请求筛选
            if ($request->has('filters') && $request->filters) {
                $filters .= ';' . $request->query('filters');
            }
            $query = $request->except(['field_id', 'filters']);
            if (!empty($query)) {
                $filters .= '&' . http_build_query($query);
            }
            if($request->has('filters') && $request->filters){
                $data = $this->oaApiSerivce->getStaff($filters);
            }else{
                $data['staff'] = $this->oaApiSerivce->getStaff($filters);
            }

        } else {
            //全部员工
            $data = $this->getFieldDepartmentUser($request,$fieldData);
        }
        return $data;
    }

    /**
     * 字段类型获取全部员工
     * @param $request
     * @param $fieldData
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    protected function getFieldDepartmentUser($request,$fieldData)
    {
        if ($request->has('filters') && $request->filters) {
            //搜索员工
            $filters = 'filters=' . $request->filters;
            if (!empty($fieldData->condition))
                $filters .= ';' . $fieldData->condition;
            $query = $request->except(['field_id', 'filters', 'department_id']);
            if (!empty($query)) {
                $filters .= '&' . http_build_query($query);
            }
            $data = $this->oaApiSerivce->getStaff($filters);
        } else {
            if ($request->has('department_id') && $request->query('department_id')) {
                //选择部门时获取
                $departmentFilters = 'filters=parent_id='.$request->query('department_id');
                $data['children'] = $this->oaApiSerivce->getDepartments($departmentFilters);

                $staffFilters = 'filters=department_id='.$request->query('department_id');
                if (!empty($fieldData->condition))
                    $staffFilters .= ';' . $fieldData->condition;
                $data['staff'] = $this->oaApiSerivce->getStaff($staffFilters);
            } else {
                $filters = 'filters=parent_id=0';
                $children = $this->oaApiSerivce->getDepartments($filters);
                $data['children'] = $children;
                $data['staff'] = [];
            }
        }
        return $data;
    }
    /**
     * 获取部门员工
     * @param $request
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getDepartmentUser($request)
    {
        if ($request->has('filters') && $request->filters) {
            //搜索员工
            $filters = 'filters=' . $request->filters;
            $query = $request->except(['filters', 'department_id']);
            if (!empty($query)) {
                $filters .= '&' . http_build_query($query);
            }
            $data = $this->oaApiSerivce->getStaff($filters);
        } else {
            if ($request->has('department_id') && $request->query('department_id')) {
                //选择部门时获取
                $departmentFilters = 'filters=parent_id='.$request->query('department_id');
                $data['children'] = $this->oaApiSerivce->getDepartments($departmentFilters);

                $staffFilters = 'filters=department_id='.$request->query('department_id');
                $data['staff'] = $this->oaApiSerivce->getStaff($staffFilters);
            } else {
                $filters = 'filters=parent_id=0';
                $children = $this->oaApiSerivce->getDepartments($filters);
                $data['children'] = $children;
                $data['staff'] = [];
            }
        }
        return $data;
    }
}