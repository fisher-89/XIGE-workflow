<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class FormFields implements Rule
{
    protected $msg = '';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach($value as $field){
            if($field['scale'] && $field['scale'] !=0){
                if(empty($field['max']) || $field['max'] == 0){
                    $this->msg = '最大值不能为空';
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
