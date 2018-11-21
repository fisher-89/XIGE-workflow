<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/4/004
 * Time: 17:24
 */

namespace App\Services\Admin\Flow;


use App\Models\Flow;
use Illuminate\Support\Facades\DB;

trait FlowClone
{
    /**
     * 流程克隆
     * @return mixed
     */
    public function flowClone()
    {
        $flowId = request('flow_id');
        $flow = Flow::with('steps')->findOrFail($flowId);
        $newFlowName = $this->getCloneFlowName($flow->name);
        $flow->name =$newFlowName;

        DB::transaction(function()use($flow,&$data){
            $data = $this->addSave($flow->toArray());
            //保存流程编号
            $data->number = $data->id;
            $data->save();
        });
        return $data;
    }

    /**
     * 获取流程克隆的名字
     * @param $oldName
     * @return string
     */
    protected function getCloneFlowName($oldName)
    {
        $name = $oldName.'copy';
        $newName='copy';
        for($i=1;$i<100;$i++){
            $count = Flow::where('name',$name.$i)->count();
            if($count == 0){
                $newName = $name.$i;
                break;
            }
        }
        return $newName;
    }
}