<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22/022
 * Time: 16:17
 */

namespace App\Repository\Admin\FlowRun;

use App\Exports\Admin\FlowRun\FormExport;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\Form;
use Maatwebsite\Excel\Facades\Excel;

class FlowRunRepository
{
    protected $excel = 'xlsx';


    /**
     * 通过流程ID获取表单数据（包含旧的）
     * @param int $flowId
     * @return mixed
     */
    public function getFlowForm(int $flowId)
    {
        $flow = Flow::findOrFail($flowId);
        $form = Form::withTrashed()
            ->where('number', $flow->form->number)
            ->orderBy('created_at', 'desc')
            ->get();
        return $form;
    }

    /**
     * 通过表单ID获取表单数据（包含旧的）
     * @param int $formId
     * @return mixed
     */
    public function getForm(int $formId)
    {
        $form = Form::findOrFail($formId);
        $data = Form::withTrashed()
            ->where('number', $form->number)
            ->orderBy('created_at', 'desc')
            ->get();
        return $data;
    }

    /**
     * 获取列表
     * @return mixed
     */
    public function getIndex()
    {
        $data = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        return $data;
    }

    /**
     * 导出数据
     * @return array
     */
    public function getExportData()
    {
        $formIds = request()->get('form_id');
        $formIds = json_decode($formIds, true);

        $flowRun = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();
        $flowRunIds = $flowRun->pluck('id')->all();
        $form = Form::withTrashed()->findOrFail($formIds[0]);

        $formExport = new FormExport($formIds,$flowRunIds);

        //保存服务器
        $filePath = 'excel/form/'.$form->name.'.'.$this->excel;
        $formExport->store($filePath, 'public');

//        //下载
        $fileName = $form->name.'.'.$this->excel;
        return $formExport->download($fileName);


    }

}