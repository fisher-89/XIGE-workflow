<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/2/002
 * Time: 10:45
 */
namespace App\Services\OA;


class OaApiService
{
    /**
     * 获取OA员工
     * @param string $filters
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public static function getStaff($filters = '')
    {
        $path = config('oa.get_staff');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取OA角色
     * @param string $filters
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public static function getRoles($filters = '')
    {
        $path = config('oa.get_roles');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取AO部门
     * @param $filters
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public static function getDepartments($filters)
    {
        $path = config('oa.get_departments');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }
}