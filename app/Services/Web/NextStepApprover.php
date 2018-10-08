<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/8/008
 * Time: 10:08
 */

namespace App\Services\Web;


use App\Services\OA\OaApiService;
use Illuminate\Support\Facades\Auth;

trait NextStepApprover
{
    /**
     *获取下一步骤审批人数据
     * @param $nextStep
     */
    protected function getNextStepApproverUser($nextStep)
    {
        switch ($nextStep->approver_type) {
            case 0://全部审批
                $userData = [];
                break;
            case 1://选择审批
                $userData = $this->getStepChooseApprover($nextStep);
                break;
            case 2://配置审批
                $userData = $this->getStepConfigurationApprover($nextStep);
                break;
            case 3://当前管理者
                $userData = $this->getCurrentManagerApprover($nextStep);
                break;
        }
        return $userData;
    }

    /**
     * 获取选择审批数据
     * @param $nextStep
     * @return array
     */
    protected function getStepChooseApprover($nextStep)
    {
        $approve = $nextStep->stepChooseApprover;
        $userData = $this->getUserData($approve->staff,$approve->roles,$approve->departments);
        return $userData;
    }

    /**
     * 获取配置审批数据
     * @param $nextStep
     * @return array
     */
    protected function getStepConfigurationApprover($nextStep)
    {
        $currentDepartmentApproverData  = $nextStep->stepDepartmentApprover->keyBy('department_id');
        if(empty($currentDepartmentApproverData))
            abort(400,$nextStep->name.' 步骤的审批人没配置');

        $currentDepartmentId = Auth::user()->department['id'];
        //当前部门审批人配置
        if(!array_has($currentDepartmentApproverData,$currentDepartmentId)){
            abort(400,'该部门的审批没有配置');
        }
        $approve = $currentDepartmentApproverData[$currentDepartmentId];
        $userData = $this->getUserData($approve->approver_staff,$approve->approver_roles,$approve->approver_departments);
        return $userData;
    }

    /**
     * 获取当前管理者审批
     * @param $nextStep
     * @return array
     */
    protected function getCurrentManagerApprover($nextStep){
        $manager = $nextStep->stepManagerApprover->approver_manager;
        $departmentManager = Auth::user()->department['manager_sn'];
        $shop = Auth::user()->shop;
        switch($manager){
            case 'department_manager'://部门管理员
                if(empty($departmentManager)){
                    abort(400,'HR系统里， 当前部门没有配置管理者');
                }
                return $this->getCurrentUserManagerInfo($departmentManager);
                break;
            case 'shop_manager'://当前店长
                if(empty($shop)){
                    abort(400,'你没有店铺，后台配置错误');
                }
                if(empty($shop['manager_sn']))
                    abort(400,'你的店铺没有配置店长');
                return $this->getCurrentUserManagerInfo($shop['manager_sn']);
                break;
            default:
                 abort(400,'审批人不存在');
        }
    }

    protected function getCurrentUserManagerInfo($staff)
    {
        $filters = 'filters=staff_sn='.$staff;
        $oaApiService = new OaApiService();
        $result = $oaApiService->getStaff($filters);
        $userData = $this->filterUserInfo($result);//筛选字段
        return $userData;
    }

    protected function getUserData(array $staff,array $roles,array $departments)
    {
        $filters = 'filters=';
        if ($staff)
            $filters .= '(staff_sn=[' . implode(',', array_pluck($staff, 'value')) . '])|';
        if($departments)
            $filters .= '(department_id=[' . implode(',', array_pluck($departments, 'value')) . '])|';
        if($roles)
            $filters .= '(roles.id=[' . implode(',', array_pluck($roles, 'value')) . '])|';
        $filters = rtrim($filters, '|');
        $oaApiService = new OaApiService();
        $result = $oaApiService->getStaff($filters);
        $userData = $this->filterUserInfo($result);//筛选字段
        return $userData;
    }
    /**
     * 过滤用户字段数据
     * @param $user
     */
    protected function filterUserInfo(array $user)
    {
        $data = array_map(function ($item) {
            $user = [];
            $user['staff_sn'] = $item['staff_sn'];
            $user['realname'] = $item['realname'];
            $user['department_id'] = $item['department']['id'];
            $user['department_full_name'] = $item['department']['full_name'];
            $user['position_name'] = $item['position']['name'];
            return $user;
        }, $user);
        return $data;
    }
}