<?php

namespace App\Http\Requests\Admin\Form;

use App\Models\Form;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormAuthRequest extends FormRequest
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
                $form = Form::findOrFail($requestId);
                $formNumber = $role->getFormNumber();
                $handleIds = $role->getFormHandleId($form->number);
                if(in_array(Auth::id(),$super) || (in_array($form->number,$formNumber) && in_array(3,$handleIds)))
                    return true;
                break;
            case 'GET':
                // 详情
                $requestId = $this->route('id');
                $form = Form::withTrashed()->findOrFail($requestId);
                $formNumber = $role->getFormNumber();
                $handleIds = $role->getFormHandleId($form->number);
                if(in_array(Auth::id(),$super) || (in_array($form->number,$formNumber) && in_array(1,$handleIds))){
                    return true;
                }
                break;
            case 'DELETE':
                $requestId = $this->route('id');
                $form = Form::findOrFail($requestId);
                $formNumber = $role->getFormNumber();
                $handleIds = $role->getFormHandleId($form->number);
                if(in_array(Auth::id(),$super) || (in_array($form->number,$formNumber) && in_array(4,$handleIds))){
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
