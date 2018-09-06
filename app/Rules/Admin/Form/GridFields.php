<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class GridFields implements Rule
{
    use Fields;
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
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $keyArray =  array_pluck($value,'key');
        //验证控件字段key唯一
        if (count($keyArray) != count(array_unique($keyArray))) {
            $this->msg = '列表控件 字段 键名 重复';
            return false;
        }

        foreach ($value as $field) {
            //验证默认值
            $check =  $this->checkDefaultValue($field);
            if($check == false){
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
