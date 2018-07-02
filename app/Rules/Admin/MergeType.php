<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;

class MergeType implements Rule
{
    protected $msg= '';
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
        foreach($value as $v){
            if($v['merge_type'] == 1 && count($v['prev_step_key'])==1){
                $next = $this->checkMergeType($value,$v['prev_step_key'][0]);
                if(count($next)>1){
                    $this->msg =$v['name'].' 步骤不能配置合并';
                    return false;
                }
            }
        }
        return true;
    }

    protected function checkMergeType($value,$stepKey){
        $nextStep = array_map(function($v) use($stepKey){
            if($v['step_key'] == $stepKey){
                return $v['next_step_key'];
            }
        },$value);
        $nextStep = array_collapse(array_filter($nextStep));
        return $nextStep;
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
