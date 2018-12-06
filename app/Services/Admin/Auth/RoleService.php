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
            $item = array_only($item, ['staff_sn', 'name']);
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
}