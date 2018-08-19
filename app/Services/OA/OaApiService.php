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
    public function getDepartments($filters)
    {
        $path = config('oa.get_departments');
        $url = $path . '?' . $filters;
        return app('curl')->get($url);
    }

    /**
     * 通过OA发送钉钉工作通知消息
     * @param $data
     * @return mixed
     */
    public function sendDingtalkJobNotificationMessage($data){
        $url = config('oa.dingtalk.message');
        return app('curl')->sendMessageByPost($url,$data);
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
    public function sendAddTodoMessage($data){
        $url = config('oa.dingtalk.todo.add');
        $result = app('curl')->sendMessageByPost($url,$data);
        return $result;
    }
}