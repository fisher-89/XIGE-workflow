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
            if ($value && $this->field['available_options']) {
               foreach ($value as $v){
                   $availableOptionsValues = array_pluck($this->field['available_options'],'value');
                   if($this->field['type'] == 'staff'){
                       array_push($availableOptionsValues,'staff');
                   }else if ($this->field['type'] == 'shop'){
                       array_push($availableOptionsValues,'shop');
                   }else if ($this->field['type'] == 'department'){
                       array_push($availableOptionsValues,'department');
                   }

                   if(!in_array($v['value'], $availableOptionsValues)){
                       $this->msg = '默认值 '.$v['text'].'不在可选项里';
                       return false;
                   }
               }
            }
            if ($value && $this->field['max'] && count($value) > $this->field['max']) {
                $this->msg = '默认值 数量不能大于最大值';
                return false;
            }
            if ($value && $this->field['min'] && count($value) < $this->field['min']) {
                $this->msg = '默认值 数量不能小于最小值';
                return false;
            }
            //最小值有时,可选项有时，可选项的个数必须大于等于最小值
            if ($this->field['min'] && $this->field['available_options'] && (count($this->field['available_options']) < $this->field['min'])) {
                $this->msg = '可选项 个数不能小于最小值';
                return false;
            }
        } else {
            // 单选
            if ($value && $this->field['available_options'] && !in_array($value['value'], array_pluck($this->field['available_options'], 'value')) && !in_array($value['value'], ['staff', 'department', 'shop'])) {
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
