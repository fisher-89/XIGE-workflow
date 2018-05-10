<?php

namespace App\Http\Requests;

use App\Services\Auth\FlowAuth;
use Illuminate\Foundation\Http\FormRequest;

class GetStartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return FlowAuth::checkFlowAuthorize($this->flow->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }
}
