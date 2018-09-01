<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/31/031
 * Time: 15:19
 */

namespace App\Services\Admin\Form;


use Illuminate\Support\Facades\DB;

class FormService
{
    use Create;//新增保存
    use Update;//编辑


    /**
     * 表单新增保存
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function() use($request, &$data){
            $data = $this->create($request);
        });
        return $data;
    }
    /**
     * 编辑
     * @param $request
     */
    public function update($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = $this->updateForm($request);
        });
        return $data;
    }
}