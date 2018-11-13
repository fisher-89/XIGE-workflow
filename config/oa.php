<?php
/**
 * Created by PhpStorm.
 * User: Fisher
 * Date: 2018/4/1 0001
 * Time: 21:59
 */

$host = env('OA_HOST', 'http://192.168.20.18:8001');
return [
    'client_id' => env('OA_CLIENT_ID', ''),
    'client_secret' => env('OA_CLIENT_SECRET', ''),
    'host' => $host,
    'get_staff' => $host . '/api/staff',//获取员工信息
    'get_roles' => $host . '/api/roles',//获取角色
    'get_departments' => $host . '/api/departments',//获取部门,
    'get_shops' => $host . '/api/shops',//获取店铺

    /**
     * 获取品牌
     */
    'get_brand' => $host . '/api/brand',

    //获取部门员工数据
//    'get_department_user' => [
//        'departments' => $host . '/api/departments/',
//        'children_and_staff' => '/children-and-staff',//
//    ],
    //通过OA获取钉钉accessToken
    'get_dingtalk_access_token' => $host . '/api/get_dingtalk_access_token',
    'dingtalk' => [
        'message' => $host . '/dingtalk/message',//发送钉钉通知
        //待办事项
        'todo' => [
            //发起待办
            'add' => $host . '/dingtalk/todo/add',
            //更新待办
            'update' => $host . '/dingtalk/todo/update',
        ]
    ],
    /**
     * 是否发送钉钉消息
     */
    'is_send_message' => true,

    //待办消息接口(OA 获取)
    'todo' => $host . '/dingtalk/todo',

    //工作通知消息接口(OA 获取)
    'job' => $host . '/dingtalk/job',
];