<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5/005
 * Time: 17:02
 */

namespace App\Services\Admin\Auth;


use App\Models\Auth\AuthFlowAuth;
use App\Models\Auth\AuthFormAuth;
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
            //操作
            $role->handle()->sync($request['handle']);

            //流程权限编号
            $flowAuthData = array_map(function ($item) {
                return ['flow_number' => $item];
            }, $request['flow_auth']);
            $role->flowAuth()->createMany($flowAuthData);

            //表单权限编号
            $formAuthData = array_map(function ($item) {
                return ['form_number' => $item];
            }, $request['form_auth']);
            $role->formAuth()->createMany($formAuthData);
        });
        return $role->load('staff', 'handle', 'flowAuth.flow', 'formAuth.form');
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
            //操作
            $role->handle()->sync($request['handle']);

            //流程权限编号
            $role->flowAuth()->delete();
            $flowAuthData = array_map(function ($item) {
                return ['flow_number' => $item];
            }, $request['flow_auth']);
            $role->flowAuth()->createMany($flowAuthData);

            //表单权限编号
            $role->formAuth()->delete();
            $formAuthData = array_map(function ($item) {
                return ['form_number' => $item];
            }, $request['form_auth']);
            $role->formAuth()->createMany($formAuthData);
        });
        return $role->load('staff', 'handle', 'flowAuth.flow', 'formAuth.form');
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
            $role->handle()->sync([]);
            $role->flowAuth()->delete();
            $role->formAuth()->delete();
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
        $super = array_unique($super);
        // 添加开发者
        array_push($super,999999);
        return $super;
    }

    /*-----------------------流程start----------------*/
    /**
     * 获取流程权限
     * @return AuthFlowAuth[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFlowAuth()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $flowAuth = AuthFlowAuth::with('roleHasHandles')->whereIn('role_id', $roleIds)->get();
        return $flowAuth;
    }

    /**
     * 获取流程编号
     * @return array
     */
    public function getFlowNumber()
    {
        $flowAuth = $this->getFlowAuth();
        $flowNumber = $flowAuth->pluck('flow_number')->all();
        return $flowNumber;
    }

    /**
     * 获取流程操作ID
     * @param int $flowNumber
     * @return array
     */
    public function getFlowHandleId(int $flowNumber)
    {
        $flowAuth = $this->getFlowAuth();
        $flowAuthKeyBy = $flowAuth->keyBy('flow_number')->toArray();
        $handleIds = [];
        if(array_has($flowAuthKeyBy,$flowNumber)){
            $roleHasHandle = $flowAuthKeyBy[$flowNumber]['role_has_handles'];
            $handleIds = array_pluck($roleHasHandle,'handle_id');
        }
        return $handleIds;
    }
    /*-----------------------流程end----------------*/

    /*-----------------------表单start----------------*/
    /**
     * 获取表单权限
     * @return AuthFormAuth[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFormAuth()
    {
        $roleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
        $formAuth = AuthFormAuth::with('roleHasHandles')->whereIn('role_id', $roleIds)->get();
        return $formAuth;
    }

    /**
     * 获取表单编号
     * @return array
     */
    public function getFormNumber()
    {
        $formAuth = $this->getFormAuth();
        $formNumber = $formAuth->pluck('form_number')->all();
        return $formNumber;
    }

    /**
     * 获取表单权限操作ID
     * @param int $formNumber
     * @return array
     */
    public function getFormHandleId(int $formNumber)
    {
        $formAuth = $this->getFormAuth();
        $formAuthKeyBy = $formAuth->keyBy('form_number')->toArray();
        $handleIds = [];
        if(array_has($formAuthKeyBy,$formNumber)){
            $roleHasHandle = $formAuthKeyBy[$formNumber]['role_has_handles'];
            $handleIds = array_pluck($roleHasHandle,'handle_id');
        }
        return $handleIds;
    }
    /*-----------------------表单end----------------*/
}