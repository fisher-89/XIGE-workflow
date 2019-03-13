<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5/005
 * Time: 17:02
 */

namespace App\Services\Admin\Auth;


use App\Models\Auth\AuthRole;
use App\Models\Auth\AuthStaff;
use App\Models\Auth\AuthStaffHasRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleService
{
    /**
     * 新增
     * @return mixed
     */
    public function store()
    {
        DB::transaction(function () use (&$role) {
            $request = request()->input();
            $role = AuthRole::create($request);
            //员工保存
            $staffSn = $this->staffHandle($request['staff']);
            $role->staff()->sync($staffSn);
        });
        return $role->load('staff');
    }

    /**
     * 员工保存
     * @param $staff
     * @return array
     */
    protected function staffHandle($staff)
    {
        return array_map(function ($item) {
            $item = array_only($item, ['staff_sn', 'realname']);
            AuthStaff::firstOrCreate($item);
            return $item['staff_sn'];
        }, $staff);
    }

    /**
     * 编辑
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        DB::transaction(function () use ($id, &$role) {
            $request = request()->input();
            $role = AuthRole::findOrFail($id);
            $role->update($request);
            //员工保存
            $staffSn = $this->staffHandle($request['staff']);
            $role->staff()->sync($staffSn);
        });
        return $role->load('staff');
    }

    /**
     * 删除
     * @param $id
     */
    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            $role = AuthRole::findOrFail($id);
            $role->staff()->sync([]);
            $role->delete();
        });
    }

    /**
     * 获取超级管理员用户
     */
    public function getSuperStaff()
    {
        $role = AuthRole::with('staff')->where('is_super', 1)->get();
        $staff = $role->pluck('staff')->toArray();
        $staff = array_collapse($staff);
        $super = array_pluck($staff, 'staff_sn');
        $super = array_values(array_unique($super));
        // 添加开发者
        array_push($super,999999);
        return $super;
    }

    /*----------------流程start-----------------*/
    /**
     * 获取操作流程number
     * @return array
     */
    public function getHandleFlowNumber()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $numbers = $roleData->map(function($role){
            $number = array_pluck($role->handle_flow,'number');
            return $number;
        });
        $numbers = $numbers->collapse()->all();
        $numbers = array_unique($numbers);
        return $numbers;
    }

    /**
     * 获取流程的操作ID
     * @param int $flowNumber
     * @return mixed
     */
    public function getFlowHandleId(int $flowNumber)
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $handleIds = $roleData->map(function($role)use($flowNumber){
            $number = array_pluck($role->handle_flow,'number');
            $handleId = [];
            if(in_array($flowNumber,$number)){
                $handleId =  $role->handle_flow_type;
            }
            return $handleId;
        });
        return $handleIds;
    }

    /*----------------流程end-----------------*/

    /*----------------表单start-----------------*/
    /**
     * 获取操作表单number
     * @return array
     */
    public function getHandleFormNumber()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $numbers = $roleData->map(function($role){
            $number = array_pluck($role->handle_form,'number');
            return $number;
        });
        $numbers = $numbers->collapse()->all();
        $numbers = array_unique($numbers);
        return $numbers;
    }

    /**
     * 获取表单的操作ID
     * @param int $formNumber
     * @return mixed
     */
    public function getFormHandleId(int $formNumber)
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $handleIds = $roleData->map(function($role)use($formNumber){
            $number = array_pluck($role->handle_form,'number');
            $handleId = [];
            if(in_array($formNumber,$number)){
                $handleId =  $role->handle_flow_type;
            }
            return $handleId;
        });
        return $handleIds;
    }

    /*----------------表单end-----------------*/

    /**
     * 导出流程number
     * @return array
     */
    public function getExportFlowNumber()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $numbers = $roleData->map(function($role){
            $number = array_pluck($role->export_flow,'number');
            return $number;
        });
        $numbers = $numbers->collapse()->all();
        $numbers = array_unique($numbers);
        return $numbers;
    }

    /**
     * 导出表单number
     * @return array
     */
    public function getExportFormNumber()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $roleData = AuthRole::find($roleIds);
        $numbers = $roleData->map(function($role){
            $number = array_pluck($role->export_form,'number');
            return $number;
        });
        $numbers = $numbers->collapse()->all();
        $numbers = array_unique($numbers);
        return $numbers;
    }
}