<?php

namespace App\Http\Requests\Admin\Flow;

use App\Models\Flow;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FlowShowAndDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $flow = Flow::withTrashed()->detail()->findOrFail($this->route('id'));

        $method = $this->method();
        $role = new RoleService();
        $super = $role->getSuperStaff();
        $flowNumber = $role->getFlowNumber();
        $handleIds = $role->getFlowHandleId($flow->number);

        if($method == 'GET'){
            //详情
            if(in_array(Auth::id(),$super) || (in_array($flow->number,$flowNumber) && in_array(1,$handleIds))){
                return true;
            }
        }elseif ($method == 'DELETE'){
            //删除
            if(in_array(Auth::id(),$super) || (in_array($flow->number,$flowNumber) && in_array(4,$handleIds))){
                return true;
            }
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
