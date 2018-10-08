<?php
/**
 * 转交
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14/014
 * Time: 11:47
 */

namespace App\Services\Web;


use App\Jobs\SendCallback;
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
        DB::transaction(function () use ($request, $stepRun, &$deliverData) {
            $stepRun->action_type = 3;
            $stepRun->acted_at = date('Y-m-d H:i:s');
            $stepRun->save();
            $stepRunData = array_except($stepRun->toArray(), ['id', 'approver_sn', 'approver_name', 'acted_at', 'created_at', 'updated_at', 'deleted_at']);
            $data = $stepRunData;
            $data['action_type'] = 0;
            $data = array_collapse([$data, $request->only(['approver_sn', 'approver_name'])]);
            $deliverData = StepRun::create($data);
        });
        //触发转交回调
        SendCallback::dispatch($deliverData->id, 'step_deliver');
        return $deliverData;
    }
}