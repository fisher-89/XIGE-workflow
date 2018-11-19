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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
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
    /*---------------------------导出start---------------------------*/
    /**
     * 开始导出
     * @return string
     */
    public function startExport()
    {
        $formIds = request()->get('form_id');
        $formIds = json_decode($formIds, true);

        $flowRun = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();

        $flowRunIds = $flowRun->pluck('id')->all();

        $codeName = date('YmdHis') . str_random(6);
        $code = Auth::id() ? Auth::id() . $codeName : $codeName;

        Artisan::queue('excel:flow-run', [
            '--formId' => $formIds,
            '--flowRunId' => $flowRunIds,
            '--code' => $code
        ]);
        return $code;
    }

    /**
     * 获取导出进度
     */
    public function getExport()
    {
        $code = request()->query('code');
        $response = Cache::get($code, []);
        return $response;
    }

    /*---------------------------导出end--------------------------*/

}