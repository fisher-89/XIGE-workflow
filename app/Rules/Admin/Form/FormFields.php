<?php

namespace App\Rules\Admin\Form;

use App\Repository\RegionRepository;
use Illuminate\Contracts\Validation\Rule;

class FormFields implements Rule
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
