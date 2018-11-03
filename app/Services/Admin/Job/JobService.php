<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/3/003
 * Time: 16:47
 */

namespace App\Services\Admin\Job;


use App\Services\OA\OaApiService;

class JobService
{
    protected $oaApi;
    public function __construct(OaApiService $oaApiService)
    {
        $this->oaApi = $oaApiService;
    }

    /**
     * 获取工作通知列表
     * @return mixed
     */
    public function index(){
        $query = request()->query();
        $query['client_id'] = config('oa.client_id');
        $query = http_build_query($query);
        return $this->oaApi->getJob($query);
    }

    /**
     * 工作通知失败重发
     * @param $id
     */
    public function update($id)
    {
        $data = $this->oaApi->retraceJob($id);
        return $data;
    }
}