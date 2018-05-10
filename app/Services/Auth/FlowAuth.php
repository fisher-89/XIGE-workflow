<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24/024
 * Time: 13:27
 */

namespace App\Services\Auth;


use App\Models\Flow;
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

     public function getCurrentUserFlowData(){

     }

}