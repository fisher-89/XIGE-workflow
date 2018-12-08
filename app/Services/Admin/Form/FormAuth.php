<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 10:01
 */

namespace App\Services\Admin\Form;


use App\Services\Admin\Auth\RoleService;

trait FormAuth
{
    /**
     * 获取表单权限数据
     * @return array
     */
    public function getFormAuth()
    {
        $role = new RoleService();
        $super = $role->getSuperStaff();
        $flowAuth = $role->getFormAuth();
        //表单权限数据
        $formData = $flowAuth->map(function ($form) {
            $handleIds = $form->roleHasHandles->pluck('handle_id')->all();
            $form->handle_id = $handleIds;
            $newFlow = $form->only(['form_number', 'handle_id']);
            return $newFlow;
        })->keyBy('form_number');
        return [
            'super' => $super,
            'data'=>$formData->toArray()
        ];
    }
}