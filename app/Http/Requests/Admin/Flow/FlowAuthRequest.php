<?php

namespace App\Http\Requests\Admin\Flow;

use App\Models\Flow;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FlowAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $role = new RoleService();
        //超级管理员
        $super = $role->getSuperStaff();

        $method = $this->method();
        switch($method){
            case 'POST':
                if(in_array(Auth::id(),$super)){
                    return true;
                }
                break;
            case 'PUT':
                $requestId = $this->route('id');
                $flow = Flow::findOrFail($requestId);
                $flowNumber = $role->getHandleFlowNumber();
                $handleIds = $role->getFlowHandleId($flow->number);
                if(in_array(Auth::id(),$super) || (in_array($flow->number,$flowNumber) && in_array(2,$handleIds)))
                    return true;
                break;
            case 'GET':
                //详情
                $requestId = $this->route('id');
                $flow = Flow::withTrashed()->findOrFail($requestId);
                $flowNumber = $role->getHandleFlowNumber();
                $handleIds = $role->getFlowHandleId($flow->number);
                if(in_array(Auth::id(),$super) || (in_array($flow->number,$flowNumber) && in_array(1,$handleIds))){
                    return true;
                }
                break;
            case 'DELETE':
                //删除
                $requestId = $this->route('id');
                $flow = Flow::findOrFail($requestId);
                $flowNumber = $role->getHandleFlowNumber();
                $handleIds = $role->getFlowHandleId($flow->number);
                if(in_array(Auth::id(),$super) || (in_array($flow->number,$flowNumber) && in_array(3,$handleIds))){
                    return true;
                }
                break;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
