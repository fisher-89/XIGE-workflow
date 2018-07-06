<?php

namespace App\Rules\Admin\Flow;

use App\Models\Field;
use App\Models\FormGrid;
use Illuminate\Contracts\Validation\Rule;

class FormFields implements Rule
{
    protected $formId;
    protected $msg = '字段验证错误';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($formId)
    {
        $this->formId = $formId;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value) {
            if (strpos($value, '.*.') === false) {
                //表单字段
                $fieldCount = Field::where(['form_id'=>$this->formId,'key'=>$value])->whereNull('form_grid_id')->whereNull('deleted_at')->count();
                if(!$fieldCount){
                    $this->msg = $value.' 字段不存在';
                    return false;
                }
            } else {
                //控件字段
                $fields = explode('.*.', $value);
                $gridKey = $fields[0];
                $field = $fields[1];
                $formGridId = FormGrid::where(['form_id' => $this->formId, 'key' => $gridKey])->whereNull('deleted_at')->value('id');
                $fieldCount = Field::where(['form_id' => $this->formId, 'form_grid_id' => $formGridId, 'key' => $field])
                    ->whereNull('deleted_at')
                    ->count();
                if(!$fieldCount){
                    $this->msg = $gridKey.' 列表控件的'.$field.'字段不存在';
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
