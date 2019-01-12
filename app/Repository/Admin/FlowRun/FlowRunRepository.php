<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22/022
 * Time: 16:17
 */

namespace App\Repository\Admin\FlowRun;

use App\Exports\Admin\FlowRun\FormExport;
use App\Jobs\FlowRunLogDownloadJob;
use App\Models\Flow;
use App\Models\FlowRun;
use App\Models\Form;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FlowRunRepository
{
    protected $excel = 'xlsx';

    protected $role;

    public function __construct(RoleService $roleService)
    {
        $this->role = $roleService;
    }

    /**
     * 通过流程number获取表单数据（包含旧的）
     * @param int $number
     * @return mixed
     */
    public function getFlowForm(int $number)
    {
        $formIds = Flow::withTrashed()->where('number', $number)->pluck('form_id')->unique()->all();
        $formNumbers = Form::withTrashed()->whereIn('id', $formIds)->pluck('number')->unique()->all();
        $form = Form::withTrashed()
            ->whereIn('number', $formNumbers)
            ->orderBy('created_at', 'desc')
            ->get();
        $form->makeHidden('handle_id')->makeVisible('deleted_at');
        return $form;
    }

    /**
     * 通过表单ID获取表单数据（包含旧的）
     * @param int $number
     * @return mixed
     */
    public function getForm(int $number)
    {
        $data = Form::withTrashed()
            ->where('number', $number)
            ->orderBy('created_at', 'desc')
            ->get();
        $data->makeHidden('handle_id');
        $data = $data->makeVisible('deleted_at')->toArray();
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
     * 获取导出流程列表
     * @return mixed
     */
    public function getFlowList()
    {
        $super = $this->role->getSuperStaff();
        $flowNumber = $this->role->getExportFlowNumber();
        if(in_array(Auth::id(),$super)){
            $data = Flow::orderBy('sort', 'asc')->get();
        }else{
            $data = Flow::whereIn('number', $flowNumber)->orderBy('sort', 'asc')->get();
        }
       return $data;
    }

    /**
     * 获取导出表单列表
     * @return mixed
     */
    public function getFormList()
    {
        $super = $this->role->getSuperStaff();
        $formNumber = $this->role->getExportFormNumber();
        if(in_array(Auth::id(),$super)){
            $data = Form::orderBy('sort', 'asc')->get();
        }else{
            $data = Form::whereIn('number', $formNumber)->orderBy('sort', 'asc')->get();
        }
        return $data;
    }
    /*---------------------------导出start---------------------------*/
    /**
     * 开始导出
     * @return string
     */
    public function startExport()
    {
        $filters = request()->query('filters');
        $filters = rtrim($filters, ';');
        $filtersData = explode(';', $filters);
        $formIds = [];

        foreach ($filtersData as $value) {
            if (str_contains($value, 'form_id=')) {
                $value = str_replace('form_id=', '', $value);
                $formIds = json_decode($value, true);
                $formIds = is_array($formIds) ? $formIds : [$formIds];
            }
        }

        $flowRun = FlowRun::filterByQueryString()
            ->sortByQueryString()
            ->withPagination();

        $flowRunIds = $flowRun->pluck('id')->all();

        $codeName = date('YmdHis') . str_random(6);
        $code = Auth::id() ? Auth::id() . $codeName : $codeName;

//        Artisan::queue('excel:flow-run', [
//            '--formId' => $formIds,
//            '--flowRunId' => $flowRunIds,
//            '--code' => $code
//        ]);

        FlowRunLogDownloadJob::dispatch($formIds, $flowRunIds, $code)->onQueue('excel');
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