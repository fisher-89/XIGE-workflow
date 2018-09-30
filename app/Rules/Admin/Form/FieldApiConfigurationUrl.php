<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class FieldApiConfigurationUrl implements Rule
{
    protected $result;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($result)
    {
        $this->result = $result;
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
        if($this->result['ok'] == false)
        {
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
        return '接口地址 配置错误';
    }
}
