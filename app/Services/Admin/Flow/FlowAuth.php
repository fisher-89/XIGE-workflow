<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7/007
 * Time: 15:10
 */

namespace App\Services\Admin\Flow;


use App\Services\Admin\Auth\RoleService;

trait FlowAuth
{
    /**
     * 获取流程权限数据
     * @return array
     */
    public function getFlowAuth()
    {
        $role = new RoleService();
        $super = $role->getSuperStaff();
        $flowAuth = $role->getFlowAuth();
        //流程权限数据
        $flowData = $flowAuth->map(function ($flow) {
            $handleIds = $flow->roleHasHandles->pluck('handle_id')->all();
            $flow->handle_id = $handleIds;
            $newFlow = $flow->only(['flow_number', 'handle_id']);
            return $newFlow;
        })->keyBy('flow_number');
        return [
            'super' => $super,
            'data'=>$flowData->toArray()
        ];
    }
}