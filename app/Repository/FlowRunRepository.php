<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5/005
 * Time: 16:21
 */

namespace App\Repository;


use App\Models\FlowRun;

class FlowRunRepository
{
    protected $user;
    protected $staffSn;

    public function __construct()
    {
        $this->staffSn = app('auth')->id();
        $this->user = app('auth')->user();
    }

    /**
     * 获取发起列表
     * @param $request
     */
    public function getSponsor($request)
    {
        $status = $this->status($request->type);
        $data = FlowRun::where('creator_sn', $this->staffSn)
            //筛选流程
            ->when($request->has('flow_id') && intval($request->flow_id), function ($query) use ($request) {
                return $query->where('flow_id', $request->flow_id);
            })
            //筛选流程状态
            ->when(($status || $status === 0), function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->paginate(15);
        return $data;
    }

    /**
     * 处理发起分类
     * @param $type
     */
    protected function status($type)
    {
        switch ($type) {
            case 'all'://全部
                $status = [];
                break;
            case 'processing'://进行中
                $status = 0;
                break;
            case 'finished'://已完成
                $status = 1;
                break;
            case 'withdraw'://撤回
                $status = -1;
                break;
            case 'rejected'://驳回
                $status = -2;
                break;
            default:
                $status = [];
        }
        return $status;
    }
}