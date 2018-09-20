<?php

namespace App\Rules\Admin\Form;

use Illuminate\Contracts\Validation\Rule;

class DateField implements Rule
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
        switch ($this->field['type']) {
            case 'date':
                if (date('Y-m-d', strtotime($value)) != $value && $value != 'date') {
                    $this->msg = '默认值 不是日期格式';
                    return false;
                }
                $minDate = $this->field['min'];
                $maxDate = $this->field['max'];
                if ($value == 'date') {
                    //当前日期
                    $value = date('Y-m-d');
                }
                if ($minDate && $value < $minDate){
                    $this->msg = '默认值 当前日期不能小于最小值';
                    return false;
                }
                if ($maxDate && $value > $maxDate){
                    $this->msg = '默认值 当前日期不能大于最大值';
                    return false;
                }
                break;
            case 'datetime':
                if (date('Y-m-d H:i:s', strtotime($value)) != $value && $value != 'datetime') {
                    $this->msg = '默认值 不是日期时间格式';
                    return false;
                }
                $minDate = $this->field['min'];
                $maxDate = $this->field['max'];
                if ($value == 'datetime') {
                    //当前日期
                    $value = date('Y-m-d H:i:s');
                }
                if ($minDate && $value < $minDate){
                    $this->msg = '默认值 当前日期时间不能小于最小值';
                    return false;
                }
                if ($maxDate && $value > $maxDate){
                    $this->msg = '默认值 当前日期时间不能大于最大值';
                    return false;
                }
                break;
            case 'time':
                if (date('H:i:s', strtotime($value)) != $value && $value != 'time') {
                    $this->msg = '默认值 不是时间格式';
                    return false;
                }
                $minDate = $this->field['min'];
                $maxDate = $this->field['max'];
//                if ($value == 'time') {
//                    //当前日期
//                    $value = date('H:i:s');
//                }
                if ($minDate && ($value != 'time') && $value < $minDate){
                    $this->msg = '默认值 当前时间不能小于最小值';
                    return false;
                }
                if ($maxDate && ($value != 'time') && $value > $maxDate){
                    $this->msg = '默认值 当前时间不能大于最大值';
                    return false;
                }
                break;
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
