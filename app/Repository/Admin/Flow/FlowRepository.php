<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/27/027
 * Time: 10:46
 */

namespace App\Repository\Admin\Flow;


class FlowRepository
{
    /**
     * 获取流程实例ID
     */
    public function getProcessInstanceId($flowId){
        $str = date('YmdHis').'-'.$flowId;
        return $str;
    }
}