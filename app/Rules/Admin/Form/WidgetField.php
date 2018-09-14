<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class WidgetField implements Rule
{
    protected $msg = '';
    protected $field;

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
            if ($value && $this->field['options'] && !in_array($value['value'], array_pluck($this->field['options'], 'id'))) {
                $this->msg = '默认值 不在可选项里';
                return false;
            }
            if($value && $this->field['max'] && count($value)> $this->field['max']){
                $this->msg = '默认值 数量不能大于最大值';
                return false;
            }
            if($value && $this->field['min'] && count($value)< $this->field['min']){
                $this->msg = '默认值 数量不能小于最小值';
                return false;
            }
        } else {
            if ($value && $this->field['options'] && !in_array($value['value'], array_pluck($this->field['options'], 'id')) && !in_array($value['value'], ['staff', 'department', 'shop'])) {
                $this->msg = '默认值 不在可选项里';
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
