<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/4/004
 * Time: 13:33
 */
return [
    // 单点登录地址
    'url' => env('SSO_URL', 'http://localhost'),

    // 自增key (字段的名称) 默认id
    'increment_key' => 'staff_sn',

    // 密码字段 默认password
    'password' => 'password',

    //获取用户接口地址
    'get_user_info_path' => '/api/staff/',

    // 获取当前用户接口地址
    'get_current_user_path' => '/api/current-user/',
];