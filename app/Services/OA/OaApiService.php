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
    public function getStaff($filters = '')
    {
        $path = config('oa.get_staff');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取部门员工
     * @param $departmentId
     * @return mixed
     */
//    public function getDepartmentUser($departmentId)
//    {
//        $url = config('oa.get_department_user.departments') . $departmentId . config('oa.get_department_user.children_and_staff');
//        return app('curl')->get($url);
//    }

    /**
     * 获取OA角色
     * @param string $filters
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getRoles($filters = '')
    {
        $path = config('oa.get_roles');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取OA部门
     * @param $filters
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getDepartments($filters = '')
    {
        $path = config('oa.get_departments');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取店铺
     * @param $filters
     */
    public function getShops($filters)
    {
        $path = config('oa.get_shops');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 获取品牌
     * @param string $filters
     * @return mixed
     */
    public function getBrand($filters = '')
    {
        $url = config('oa.get_brand') . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 通过OA发送钉钉工作通知消息
     * @param $data
     * @return mixed
     */
    public function sendDingtalkJobNotificationMessage($data)
    {
        $url = config('oa.dingtalk.message');
        return app('curl')->post($url, $data);
    }

    /**
     * 获取钉钉accessToken
     * @return mixed
     */
    public function getDingtalkAccessToken()
    {
        $url = config('oa.get_dingtalk_access_token');
        $result = app('curl')->get($url);
        return $result['message'];
    }

    /*
     * 发起待办信息（钉钉）
     */
    public function sendAddTodoMessage($data)
    {
        $url = config('oa.dingtalk.todo.add');
        $result = app('curl')->post($url, $data);
        return $result;
    }

    /**
     * 更新待办信息（钉钉）
     * @param $data
     * @return mixed
     */
    public function updateTodo($data)
    {
        $url = config('oa.dingtalk.todo.update');
        $result = app('curl')->post($url,$data);
        return $result;
    }

    /**
     * 获取待办列表
     * @param $query
     * @return mixed
     */
    public function getTodo($query)
    {
        $url = config('oa.todo').'?'.$query;
        return app('curl')->get($url);
    }

    /**
     * 重发失败的待办通知
     * @param $id
     * @return mixed
     */
    public function retraceTodo($id)
    {
        $url = config('oa.todo').'/'.$id;
        return app('curl')->post($url,[]);
    }

    /**
     * 获取工作通知列表
     * @param $query
     * @return mixed
     */
    public function getJob($query)
    {
        $url = config('oa.job').'?'.$query;
        return app('curl')->get($url);
    }

    /**
     * 重发失败的工作通知
     * @param $id
     * @return mixed
     */
    public function retraceJob($id)
    {
        $url = config('oa.job').'/'.$id;
        return app('curl')->post($url,[]);
    }
}