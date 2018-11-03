<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/3/003
 * Time: 16:47
 */

namespace App\Services\Admin\Todo;


use App\Services\OA\OaApiService;

class TodoService
{
    protected $oaApi;
    public function __construct(OaApiService $oaApiService)
    {
        $this->oaApi = $oaApiService;
    }

    /**
     * 获取待办通知列表
     * @return mixed
     */
    public function index(){
        $query = http_build_query(request()->query());
        return $this->oaApi->getTodo($query);
    }

    /**
     * 待办通知失败重发
     * @param $id
     */
    public function update($id)
    {
        $data = $this->oaApi->retraceTodo($id);
        return $data;
    }
}