<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class ArrayField implements Rule
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
        if ($value && $this->field['min'] && count($value) < $this->field['min']) {
            $this->msg = '默认值 数量不能小于最小值';
            return false;
        }
        if ($value && $this->field['max'] && count($value) > $this->field['max']) {
            $this->msg = '默认值 数量不能大于最大值';
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
        return $this->msg;
    }
}
