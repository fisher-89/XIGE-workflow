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
        $staff = new StaffRepository();
        $data = $staff->getUser($request);
        return $data;
    }

    /**
     * 获取部门
     * @param $request
     * @return array
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getDepartment($request)
    {
        $isConfig = false;
        if ($request->has('field_id') && $request->field_id) {
            //表单字段选择
            $fieldData = Field::find($request->field_id);
            if (count($fieldData->widgets) > 0) {
                //部门配置有权限，查询部门列表数据
                $filters = 'filters=id=[' . implode(',', $fieldData->widgets->pluck('value')->all()) . ']';
                $data = $this->oaApiSerivce->getDepartments($filters);
                $isConfig = true;
            } else {
                //全部部门
                $data = $this->oaApiSerivce->getDepartments();
            }
        } else {
            //全部部门
            $data = $this->oaApiSerivce->getDepartments();
        }
        return [
            'is_config' => $isConfig,
            'data' => $data
        ];
    }

    /**
     * 获取店铺
     * @param $request
     */
    public function getShop($request)
    {
        $isConfig = false;
        if($request->has('field_id') && $request->field_id){
            //表单控件选择店铺
            $fieldData = Field::find($request->field_id);
            if (count($fieldData->widgets) > 0) {
                //含有权限店铺
                $oaId = $fieldData->widgets->pluck('value')->all();
                $filters = 'filters=shop_sn=['.implode(',',$oaId).']';
                //请求筛选
                if ($request->has('filters')) {
                    $filters .= ';' . $request->query('filters');
                }
                $query = $request->except(['field_id', 'filters']);
                if (!empty($query)) {
                    $filters .= '&' . http_build_query($query);
                }
                $data = $this->oaApiSerivce->getShops($filters);
                $isConfig = true;
            }else{
                //全部店铺
                $data = $this->getAllShops($request);
            }
        }else{
            //全部店铺
            $data = $this->getAllShops($request);
        }
        return [
            'is_config' => $isConfig,
            'data' => $data
        ];
    }

    private function getAllShops($request){
        $filters = '';
        if($request->has('filters')){
            $filters .= 'filters='.$request->filters;
        }
        $query = $request->except(['filters']);
        if(!empty($query)){
            $filters .= '&'.http_build_query($query);
        }
        $data = $this->oaApiSerivce->getShops($filters);
        return $data;
    }
}