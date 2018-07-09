<?php
/**
 * 转交
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14/014
 * Time: 11:47
 */

namespace App\Services\Web;


use App\Models\StepRun;
use Illuminate\Support\Facades\DB;

class DeliverService
{
    /**
     * 转交处理
     * @param $request
     */
    public function deliver($request)
    {
        $stepRun = StepRun::find($request->input('step_run_id'));
        $deliverData = [];
        DB::transaction(function () use ($request,$stepRun, &$deliverData) {
            $stepRun->action_type = 3;
            $stepRun->save();
            $stepRunData = array_except($stepRun->toArray(), ['id', 'approver_sn', 'approver_name', 'created_at', 'updated_at', 'deleted_at']);
            foreach ($request->input('deliver') as $staff) {
                $data = $stepRunData;
                $data['action_type'] = 0;
                $data = array_collapse([$data, $staff]);
                $deliverStepRunData = StepRun::create($data);
                $deliverData[] = $deliverStepRunData->toArray();
            }
        });
        return $deliverData;
        //一条sql处理新增
//        $data = array_map(function($staff) use($stepRunData){
//            $stepRunData['action_type'] = 3;
//            return array_collapse([$stepRunData,$staff]);
//        },$request->input('deliver'));
//        $deliverData = StepRun::insert($data);
    }
}