<?php
/**
 * Created by PhpStorm.
 * User: Fisher
 * Date: 2018/4/1 0001
 * Time: 21:59
 */

$host = env('OA_HOST', 'http://192.168.20.18:8001');
return [
    'host' => $host,
    'get_staff' => $host . '/api/staff',//获取员工信息
    'get_roles' => $host . '/api/roles',//获取角色
    'get_departments' => $host . '/api/departments',//获取部门
];