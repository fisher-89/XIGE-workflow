<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7/007
 * Time: 9:28
 */

namespace App\Services\Admin;


use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\SubStep;
use App\Repository\Admin\Flow\FlowRepository;
use Illuminate\Support\Facades\DB;

class FlowService
{
    /**
     * 新增
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->addSave($request);
        });
        return $data;
    }

    /**
     * 修改
     * @param $request
     * @return mixed
     */
    public function update($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->editSave($request);
        });
        return $data;
    }

    /**
     * 流程与步骤新增
     * @param $request
     * @return mixed
     */
    protected function addSave($request)
    {
        //创建流程数据
        $flow = Flow::create($request->input());//保存流程数据
        $flowRepository = new FlowRepository();
        if ($request->has('id')) {
            //编辑时新增
            $delFlow = Flow::withTrashed()->find($request->id);
            $flow->process_instance_id = $delFlow->process_instance_id;
        } else {
            //新增
            //获取流程实例ID
            $flow->process_instance_id = $flowRepository->getProcessInstanceId($flow->id);
        }
        $flow->save();
        //创建步骤与流程发起数据
        $this->createData($flow, $request);
        return $flow->withDetail();
    }

    /**
     * 编辑保存
     * @param $request
     */
    private function editSave($request)
    {
        $flow = Flow::find($request->id);
        if (empty($flow))
            abort(404, '当前流程不存在');
        $flowNum = FlowRun::where('flow_id', $request->id)->count();
        if ($flowNum > 0) {
            $flow->delete();
            $flow = $this->addSave($request);
        } else {
            $flow->update($request->input());//保存流程数据
            $flow->staff()->delete();
            $flow->roles()->delete();
            $flow->departments()->delete();
            $flow->steps()->delete();
            $flow->subSteps()->delete();//删除子步骤

            //创建步骤与流程发起数据
            $this->createData($flow, $request);
        }
        return $flow->withDetail();
    }

    /**
     * 创建步骤与流程发起数据
     * @param $flow
     * @param $request
     */
    protected function createData($flow, $request)
    {
        //创建流程发起的员工
        $flow->staff()->createMany(array_map(function ($item) {
            return [
                'staff_sn' => $item
            ];
        }, $request->input('flows_has_staff', [])));

        //创建流程发起的角色
        $flow->roles()->createMany(array_map(function ($item) {
            return [
                'role_id' => $item
            ];
        }, $request->input('flows_has_roles', [])));

        //创建流程发起的部门
        $flow->departments()->createMany(array_map(function ($item) {
            return [
                'department_id' => $item
            ];
        }, $request->input('flows_has_departments', [])));

        //创建步骤
        $flow->steps()->createMany($request->input('steps'));

        //创建子步骤
        $this->createSubSteps($flow, $request->input('steps'));//创建子步骤数据
    }

    /**
     * 创建子步骤数据
     * @param $flowId
     * @param $steps
     */
    protected function createSubSteps($flow, $steps)
    {
        $steps = array_pluck($steps, [], 'step_key');
        foreach ($steps as $k => $v) {
            if (count($v['prev_step_key']) > 1) {
                $allStepLine = $this->getAllPrevStep($v, $steps);//获取该步骤的所有子步骤
                $subStepKey = $this->subStepKey($allStepLine);//子步骤
                $parentKey = $v['step_key'];
                $this->createSubStepData($flow->id, $subStepKey, $parentKey);
            }
        }
    }

    /**
     * 获取当前步骤上一步的所有子步骤
     * @param $currentStep
     * @param $steps
     * @param array $stepKeyGroup
     * @return array
     */
    protected function getAllPrevStep($currentStep, $steps, $stepKeyGroup = [])
    {
        $allStep = [];
        if (count($currentStep['prev_step_key']) > 0) {
            foreach ($currentStep['prev_step_key'] as $prevStepKey) {
                $prevStep = $steps[$prevStepKey];
                $subStepKeyGroup = $stepKeyGroup;
                $subStepKeyGroup[] = $prevStepKey;
                $allStep[] = $this->getAllPrevStep($prevStep, $steps, $subStepKeyGroup);
            }
            return array_collapse($allStep);
        } else {
            return [$stepKeyGroup];
        }
    }

    /**
     * 获取子步骤
     * @param $allStep
     * @return array
     */
    protected function subStepKey($allStep)
    {
        $commonSteps = call_user_func_array('array_intersect', $allStep);//取出二位数组相同的值并转为一位数组
        $concurrentStepKey = array_first($commonSteps);//获取开始节点（步骤ID）
        //所有子步骤ID
        $subSteps = array_map(function ($stepKeys) use ($concurrentStepKey) {
            $stepKeys = array_reverse($stepKeys);
            $index = array_search($concurrentStepKey, $stepKeys);
            return array_slice($stepKeys, $index);
        }, $allStep);
        $subSteps = array_unique(array_collapse($subSteps));//合并子步骤并去重
        $subSteps = array_except($subSteps, array_search($concurrentStepKey, $subSteps));//去除开始步骤节点
        return $subSteps;
    }

    /**
     * 创建子步骤数据
     * @param $flowId
     * @param $stepKey
     * @param $parentKey
     */
    private function createSubStepData($flowId, $stepKey, $parentKey)
    {
        $data = array_map(function ($step) use ($flowId, $parentKey) {
            return [
                'flow_id' => $flowId,
                'step_key' => $step,
                'parent_key' => $parentKey
            ];
        }, $stepKey);
        SubStep::insert($data);
    }


}