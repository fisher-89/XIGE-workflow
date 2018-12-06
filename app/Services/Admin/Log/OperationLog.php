<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/25/025
 * Time: 17:45
 * 操作日志
 */

namespace App\Services\Admin\Log;


use App\Models\Auth\AuthRole;
use App\Models\FieldApiConfiguration;
use App\Models\Flow;
use App\Models\FlowType;
use App\Models\Form;
use App\Models\FormType;
use App\Models\Log;
use App\Models\StepApprover;
use App\Models\StepDepartmentApprover;
use App\Models\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationLog
{
    public function writeLog(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $this->post();
                break;
            case 'PUT':
                $this->put();
                break;
            case 'DELETE':
                $this->delete();
                break;
        }
    }

    protected function getData()
    {
        $data['staff'] = Auth::id();
        $data['realname'] = Auth::user()->realname;
        $data['method'] = request()->method();
        $data['path'] = request()->path();
        $data['after'] = request()->input();
        return $data;
    }

    protected function post()
    {
        $data = $this->getData();
        //去除 检查OA接口地址测试、流程克隆、流程图标上传
        if (!in_array($data['path'], [
            'admin/check-oa-api',
            'admin/flow-clone',
            'admin/flow-icon'
        ])) {
            Log::create($data);
        }

    }

    protected function put()
    {
        $data = $this->getData();
        $data['request_id'] = request()->route('id');
        switch ($data['path']) {
            case 'admin/form-type/'.$data['request_id']:
                $data['before'] = FormType::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/flow-type/'.$data['request_id']:
                $data['before'] = FlowType::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/validator/'.$data['request_id']:
                $data['before'] = Validator::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/form/'.$data['request_id']:
                $form = Form::withTrashed()->with([
                    'fields' => function ($query) {
                        $query->whereNull('form_grid_id')->orderBy('sort', 'asc');
                    },
                    'fields.validator',
                    'grids.fields.validator'
                ])->findOrFail($data['request_id']);
                $data['before'] = $form->toArray();
                break;
            case 'admin/flow/'.$data['request_id']:
                $flow = Flow::withTrashed()->with('steps')->findOrFail($data['request_id']);
                $data['before'] = $flow->toArray();
                break;
            case 'admin/field-api-configuration/'.$data['request_id']:
                $data['before'] = FieldApiConfiguration::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/step-approver/'.$data['request_id']:
                $data['before'] = StepApprover::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/step-department-approver/'.$data['request_id']:
                $data['before'] = StepDepartmentApprover::findOrFail($data['request_id'])->toArray();
                break;
            case 'admin/auth/role/'.$data['request_id']:
                $data['before'] = AuthRole::with('staff','handle','flowAuth.flow','formAuth.form')->findOrFail($data['request_id']);
                break;
            default:
                $data['before'] = [];
        }
        Log::create($data);
    }


    protected function delete()
    {
        $data = $this->getData();
        $data = array_except($data,'after');
        $data['request_id'] = request()->route('id');
        Log::create($data);
    }
}