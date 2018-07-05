<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class GridFields implements Rule
{
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
        if (count($keyArray) != count(array_unique($keyArray))) {
            return false;
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
        return '列表控件 字段 键名 重复';
    }
}
