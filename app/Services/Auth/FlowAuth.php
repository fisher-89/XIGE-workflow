<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24/024
 * Time: 13:27
 */

namespace App\Services\Auth;


use App\Models\Flow;
use App\Models\FlowHasDepartment;
use App\Models\FlowHasRole;
use App\Models\FlowHasStaff;
use Illuminate\Support\Facades\Auth;

class FlowAuth
{
    /**
     * 检测该用户是否有流程权限
     * @param $flowId
     * @return bool
     */
    public static function checkFlowAuthorize($flowId)
    {
        $flow = Flow::find($flowId);
        $user = Auth::user();
        $availableDepartments = $flow->departments;
        $availableRoles = $flow->roles;
        $availableStaff = $flow->staff;
        $hasAuthorize = $availableDepartments->count() + $availableRoles->count() + $availableStaff->count() > 0;
        $matchDepartment = $availableDepartments->filter(function ($item) use ($user) {
                return $item->department_id == $user->department['id'];
            })->count() > 0;
        $matchRole = $availableRoles->filter(function ($item) use ($user) {
                return $item->role_id == $user->position['id'];
            })->count() > 0;
        $matchStaff = $availableStaff->filter(function ($item) use ($user) {
                return $item->staff_sn == $user->staff_sn;
            })->count() > 0;
        return !$hasAuthorize || $matchDepartment || $matchRole || $matchStaff;
    }

    /**
     * 获取当前用户的有哪些流程权限
     */
    public static function getCurrentUserFlowAuthorize()
    {
        $user = Auth::user();
        $staffSn = $user->staff_sn;//员工编号
        $roleId = $user->position['id'];//角色id
        $departmentId = $user->department['id'];//部门ID
        $staffFlowIds = FlowHasStaff::whereStaffSn($staffSn)->pluck('flow_id')->all();
        $roleFlowIds = FlowHasRole::whereRoleId($roleId)->pluck('flow_id')->all();
        $departmentFlowIds = FlowHasDepartment::whereDepartmentId($departmentId)->pluck('flow_id')->all();
        $flowId = array_unique(array_collapse([$staffFlowIds,$roleFlowIds,$departmentFlowIds]));

        //获取没配置流程权限流程
        $flowData = Flow::whereNotIn('id',$flowId)->get();
        //获取没配置权限的流程ID
        $allAuthFlowId = $flowData->filter(function($flow){
            $auth = self::checkFlowAuthorize($flow->id);
            return $auth;
        })->pluck('id')->all();

        return array_collapse([$flowId,$allAuthFlowId]);
    }

}