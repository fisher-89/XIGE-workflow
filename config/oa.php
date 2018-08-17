<?php
/**
 * Created by PhpStorm.
 * User: Fisher
 * Date: 2018/4/1 0001
 * Time: 21:59
 */

$host = env('OA_HOST', 'http://192.168.20.18:8001');
return [
    'client_id' => env('OA_CLIENT_ID',''),
    'client_secret' => env('OA_CLIENT_SECRET',''),
    'host' => $host,
    'get_staff' => $host . '/api/staff',//获取员工信息
    'get_roles' => $host . '/api/roles',//获取角色
    'get_departments' => $host . '/api/departments',//获取部门,
    //通过OA获取钉钉accessToken
    'get_dingtalk_access_token'=>$host.'/api/get_dingtalk_access_token',
    'dingtalk'=>[
      'message'=>$host . '/dingtalk/message',//发送钉钉通知
    ],
];