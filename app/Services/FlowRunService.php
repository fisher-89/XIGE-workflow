<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11/011
 * Time: 16:03
 */

namespace App\Services;


use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\Step;
use Illuminate\Support\Facades\Auth;

class FlowRunService
{

    protected $flowId;
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * 创建流程运行数据
     */
    public function create($flowId)
    {
        $flowData = Flow::select('id as flow_id','name','form_id')->find($flowId);
        $flowData->creator_sn = $this->user->staff_sn;
        $flowData->creator_name = $this->user->realname;
        $data = FlowRun::create($flowData->toArray());
        return $data;
    }

    /**
     * 流程结束处理
     * @param $id
     */
    public function endFlow($id){
        $data = FlowRun::find($id);
        $data->status =1;
        $data->end_at = date('Y-m-d H:i:s',time());
        $data->save();
    }

    /**
     * 获取流程运行数据
     * @param $id
     */
    public function find($id){
        return FlowRun::find($id);
    }
}