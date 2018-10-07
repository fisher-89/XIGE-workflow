<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6/006
 * Time: 10:48
 */

namespace App\Services\Admin;


use App\Models\StepApprover;
use App\Models\StepDepartmentApprover;
use Illuminate\Support\Facades\DB;

class StepApproverService
{
    /**
     * 新增
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        DB::transaction(function () use ($request, &$data) {
            $data = StepApprover::create($request->input());
            $data->departments()->createMany($request->input('departments'));
        });
        return $data->load('departments');
    }

    /**
     * 编辑
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        DB::transaction(function () use ($request, $id, &$data) {
            $data = StepApprover::find($id);
            $data->update($request->input());
            $data->departments()->delete();
            $data->departments()->createMany($request->input('departments'));
        });
        return $data->load('departments');
    }

}