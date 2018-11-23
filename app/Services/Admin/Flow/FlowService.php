<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7/007
 * Time: 9:28
 */

namespace App\Services\Admin\Flow;


use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\Step;
use App\Models\SubStep;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FlowService
{
    //流程克隆
    use FlowClone;

    protected $flowIcon;

    public function __construct(FlowIcon $flowIcon)
    {
        $this->flowIcon = $flowIcon;
    }

    /**
     * 新增
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->addSave($request->input());
            //保存流程编号
            $data->number = $data->id;
            $data->save();
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
    protected function addSave(array $request)
    {
        //创建流程数据
        $flow = Flow::create($request);//保存流程数据

        //图标移动到正式目录
        $this->moveIcon($flow,$request['icon']);
        dd($flow->toArray());

        //流程发起人data
        $this->createFlowSponsor($flow, $request);

        //创建步骤
        $this->createStepData($request['steps'], $flow);

        //创建子步骤
        $this->createSubSteps($flow, $request['steps']);//创建子步骤数据
        return $flow->withDetail();
    }

    /**
     * 编辑保存
     * @param $request
     */
    protected function editSave($request)
    {
        $flow = Flow::findOrFail($request->id);
        $flowNum = FlowRun::where('flow_id', $request->id)->count();
        if ($flowNum > 0) {
            $oldFlow = $flow;
            $flow->delete();
            $flow = $this->addSave($request->input());
            //保存流程编号
            $flow->number = $oldFlow->number;
            $flow->save();
        } else {
            $this->updateFlowData($flow, $request->input());
        }
        return $flow->withDetail();
    }

    /**
     * 移动临时文件到正式目录
     * @param $flow
     * @param string $icon
     */
    protected function moveIcon($flow,string $icon)
    {
        if ($icon){
            if(str_contains($icon,'perpetual')){
                //正式目录有
                $iconPath = str_replace(config('app.url'), '', $icon);
            }else{
                //正式目录无
                $iconPath = $this->flowIcon->move($icon, $flow->id);
            }
            $flow->icon = $iconPath;
            $flow->save();
        }
    }

    /**
     * 创建步骤数据
     * @param array $steps
     * @param $flow
     */
    protected function createStepData(array $steps, $flow)
    {
        array_map(function ($step) use ($flow) {
            $step['flow_id'] = $flow->id;
            $this->createStep($step);
        }, $steps);
    }

    protected function createStep(array $step)
    {
        $stepData = Step::create($step);
        switch ($step['approver_type']) {
            case 1:
                $stepData->stepChooseApprover()->create(array_only($step['approvers'], ['staff', 'roles', 'departments']));
                break;
            case 3:
                $stepData->stepManagerApprover()->create(['approver_manager' => $step['approvers']['manager']]);
                break;
        }
        return $stepData;
    }

    /**
     * 修改流程data数据
     * @param $flow
     * @param $request
     */
    protected function updateFlowData($flow, array $request)
    {
        //保存流程数据
        $flow->update($request);

        //图标移动到正式目录
        $this->moveIcon($flow,$request['icon']);

        //修改修改流程发起人数据
        $this->updateFlowSponsor($flow, $request);
        //修改步骤数据
        $this->updateStepData($flow, $request['steps']);
        $flow->subSteps()->delete();//删除子步骤
        //创建子步骤
        $this->createSubSteps($flow, $request['steps']);//创建子步骤数据
    }

    /**
     * 修改流程发起人数据
     * @param $flow
     * @param $request
     */
    protected function updateFlowSponsor($flow, array $request)
    {
        $flow->staff()->delete();
        $flow->roles()->delete();
        $flow->departments()->delete();
        $this->createFlowSponsor($flow, $request);
    }

    /**
     * 修改步骤数据
     * @param $flow
     * @param $request
     */
    protected function updateStepData($flow, array $steps)
    {
        //全部步骤ID
        $allId = $flow->steps->pluck('id')->all();
        $updateId = [];
        array_map(function ($step) use ($flow, &$updateId) {
            if (array_has($step, 'id')) {
                //编辑步骤含有ID的
                $updateId[] = $step['id'];
                $stepData = Step::find($step['id']);

                if ($stepData->approver_type == 1) {
                    $stepData->stepChooseApprover()->delete();
                } else if ($stepData->approver_type == 3) {
                    $stepData->stepManagerApprover()->delete();
                }

                $stepData->update($step);

                if ($stepData->approver_type == 1) {
                    $stepData->stepChooseApprover()->create(array_only($step['approvers'], ['staff', 'roles', 'departments']));
                } else if ($stepData->approver_type == 3) {
                    $stepData->stepManagerApprover()->create(['approver_manager' => $step['approvers']['manager']]);
                }
            } else {
                //编辑时没有ID的进行新增
                $step['flow_id'] = $flow->id;
                $stepData = Step::create($step);
                switch ($step['approver_type']) {
                    case 1:
                        $stepData->stepChooseApprover()->create(array_only($step['approvers'], ['staff', 'roles', 'departments']));
                        break;
                    case 3:
                        $stepData->stepManagerApprover()->create(['approver_manager' => $step['approvers']['manager']]);
                        break;
                }
            }
        }, $steps);

        //删除没编辑ID的
        $deleteId = array_diff($allId, $updateId);
        if ($deleteId) {
            $deleteData = Step::find($deleteId);
            $deleteData->each(function ($step) {
                if ($step->approver_type == 1) {
                    $step->stepChooseApprover()->delete();
                } else if ($step->approver_type == 3) {
                    $step->stepManagerApprover()->delete();
                }
                $step->delete();
            });
        }
    }

    /**
     * 创建流程发起人数据
     * @param $flow
     * @param $request
     */
    protected function createFlowSponsor($flow, array $request)
    {
        //创建流程发起的员工
        $flow->staff()->createMany(array_map(function ($item) {
            return [
                'staff_sn' => $item
            ];
        }, $request['flows_has_staff']));

        //创建流程发起的角色
        $flow->roles()->createMany(array_map(function ($item) {
            return [
                'role_id' => $item
            ];
        }, $request['flows_has_roles']));

        //创建流程发起的部门
        $flow->departments()->createMany(array_map(function ($item) {
            return [
                'department_id' => $item
            ];
        }, $request['flows_has_departments']));
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