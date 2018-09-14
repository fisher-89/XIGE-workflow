<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class SelectField implements Rule
{
    protected $field;
    protected $msg = '';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
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
        if ($this->field['is_checkbox'] == 1) {
            if($value && $this->field['min'] && count($value)<$this->field['min']){
                $this->msg = '默认值 最小个数不能小于最小值';
                return false;
            }
            if($value && $this->field['max'] && count($value)>$this->field['max']){
                $this->msg = '默认值 最小个数不能大于最大值';
                return false;
            }
            if($value){
                foreach($value as $v){
                    if(!in_array($v,$this->field['options'])){
                        $this->msg = '默认值 '.$v.'不在可选值里';
                        return false;
                    }
                }
            }
        } else {
            if ($value && count($value) > 1) {
                $this->msg = '默认值 不是多选时默认值只能有一个';
                return false;
            }
            if ($value && !in_array($value[0], $this->field['options'])) {
                $this->msg = '默认值 只能在可选值里';
                return false;
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
