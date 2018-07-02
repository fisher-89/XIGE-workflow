<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\FlowRequest;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\SubStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FlowController extends Controller
{
    /**
     * 流程新增保存
     * @param FlowRequest $request
     * @return mixed
     */
    public function store(FlowRequest $request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->addSave($request);
        });
        return app('apiResponse')->post($data);
    }

    /**
     * 流程编辑保存
     * @param FlowRequest $request
     * @return mixed
     */
    public function update(FlowRequest $request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->editSave($request);
        });
        return app('apiResponse')->put($data);
    }

    /**
     * 流程获取列表
     * @param Request $request
     */
    public function index()
    {
        $data = Flow::with('steps')->orderBy('sort', 'asc')->get();
        return app('apiResponse')->get($data);
    }

    /**
     * 流程删除
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $flow = Flow::find($request->id);
        if (empty($flow))
            abort(404, '该流程不存在');
        if ($flow->is_active == 1)
            abort(403, '该流程已启用无法进行删除');
        $flow->delete();
        return app('apiResponse')->delete();
    }


    /**
     * 流程获取编辑数据
     * @param Request $request
     */
    public function show($id)
    {
        $flow = Flow::detail()->find($id);
        if (empty($flow))
            abort(404,'该流程不存在');
        return app('apiResponse')->get($flow);
    }


    /**
     * 新增保存
     * @param $request
     */
    private function addSave($request)
    {
        $flow = Flow::create($request->input());//保存流程数据
        $flow->staff()->createMany(array_map(function ($item) {
            return [
                'staff_sn' => $item
            ];
        }, $request->input('flows_has_staff', [])));
        $flow->roles()->createMany(array_map(function ($item) {
            return [
                'role_id' => $item
            ];
        }, $request->input('flows_has_roles', [])));
        $flow->departments()->createMany(array_map(function ($item) {
            return [
                'department_id' => $item
            ];
        }, $request->input('flows_has_departments', [])));
        $flow->steps()->createMany($request->input('steps'));

        $this->createSubSteps($flow, $request->input('steps'));//创建子步骤数据
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

            $flow->staff()->createMany(array_map(function ($item) {
                return [
                    'staff_sn' => $item
                ];
            }, $request->input('flows_has_staff', [])));
            $flow->roles()->createMany(array_map(function ($item) {
                return [
                    'role_id' => $item
                ];
            }, $request->input('flows_has_roles', [])));
            $flow->departments()->createMany(array_map(function ($item) {
                return [
                    'department_id' => $item
                ];
            }, $request->input('flows_has_departments', [])));
            $flow->steps()->forceDelete();
            $flow->steps()->createMany($request->input('steps'));
            $flow->subSteps()->delete();//删除子步骤
            $this->createSubSteps($flow, $request->input('steps'));//创建子步骤数据
        }
        return $flow->withDetail();
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
