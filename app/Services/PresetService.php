<?php
/**
 * 预提交服务
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/20/020
 * Time: 13:57
 */

namespace App\Services;


use App\Models\Step;

class PresetService
{
    /**
     *获取下一步骤数据
     * @param $step
     * @param $formData
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getNextStep($step, array $formData)
    {
        $stepData = Step::where('flow_id', $step->flow_id)->whereIn('step_key', $step->next_step_key)->get();
        $isNext = false;//下一步是否配置错误
        $nextStep = [];
        foreach ($stepData as $k => $stepItem) {
            $allowCondition = empty($stepItem->allow_condition) ? true : app('formData')->analysisDefaultValueVariate($stepItem->allow_condition, $formData);
            $skipCondition = empty($stepItem->skip_condition) ? false : app('formData')->analysisDefaultValueVariate($stepItem->skip_condition, $formData);
            $stepItem->approvers = $this->getUserInfo($stepItem->approvers);//获取审批人信息
            if ($allowCondition && $skipCondition) {//访问条件通过 略过条件true
                if ($stepItem->merge_type == 1 && count($step->next_step_key) > 1) {
                    $isNext = true;
                    break;
                } else {
                    $skipStep = $this->getNextStep($stepItem, $formData);
                    $nextStep = array_collapse([$nextStep, $skipStep]);
                }
            } elseif ($allowCondition && !$skipCondition) {//访问条件通过  未略过条件
                if ($stepItem->merge_type == 1 && count($step->next_step_key) > 1) {
                    $isNext = true;
                    break;
                } else {
                    $nextStep[] = $stepItem;
                }
            }
        }
        if ($isNext) {
            return [];
        }
        return collect($nextStep);
    }


    /**
     * 从OA获取人员数据
     * @param $data
     * staff 员工编号 array
     * roles 角色ID   array
     * departments 部门ID array
     */
    public function getUserInfo(array $data)
    {
        $staffData = [];
        $roleData = [];
        $departmentData = [];
        if (!empty($data['staff']))
            $staffData = $this->getOaUser($data['staff'], 'staff_sn');
        if (!empty($data['roles']))
            $roleData = $this->getOaUser($data['roles'], 'role.id');
        if (!empty($data['departments']))
            $departmentData = $this->getOaUser($data['departments'], 'department_id');
        $userData = array_collapse([$staffData, $roleData, $departmentData]);//合并数据
        $userData = $this->filterUserInfo($userData);//筛选字段
        $userData = $this->userDistinct($userData);//去除重复的员工
        return $userData;
    }

    /**
     * 通过接口获取OA用户信息
     * @param array $data
     * @param $field
     * @return mixed
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    protected function getOaUser(array $data, $field)
    {
        $path = config('oa.get_staff');
        $dataStr = implode(',', $data);
        $filter = '?filters=' . $field . '=[' . $dataStr . '];status_id>=0';
        $url = $path . $filter;
        $response = app('curl')->get($url);
        return $response;
    }

    /**
     * 预提交数据存入缓存
     * @param $formData 表单数据
     * @param $availableStep 下一步审批人数据
     */
    public function setPresetDataToCache($data)
    {
        $userStaffSn = app('auth')->user()->staff_sn;
        cache()->put(time() . $userStaffSn, $data, 10);
        return time();
    }

    /**
     * 获取预提交数据
     * @param $timestamp
     */
    public function getPresetData($timestamp)
    {
        $cacheName = $timestamp . app('auth')->user()->staff_sn;
        return cache()->get($cacheName);
    }

    /**
     * 清楚预提交缓存数据
     * @param $timestamp
     * @throws \Exception
     */
    public function forgetPresetData($timestamp)
    {
        $cacheName = $timestamp . app('auth')->user()->staff_sn;
        cache()->forget($cacheName);
    }

    /**
     * 过滤用户字段数据
     * @param $user
     */
    protected function filterUserInfo($user)
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

    /**
     * 员工数据去重
     * @param $user
     */
    protected function userDistinct($user)
    {
        $staff = [];
        $data = array_map(function ($item) use (&$staff) {
            if (!in_array($item['staff_sn'], $staff)) {
                $staff[] = $item['staff_sn'];
                return $item;
            }

        }, $user);
        $data = array_merge(array_filter($data));//去除空值与重新排序
        return $data;
    }
}