<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;

class StepApprover implements Rule
{
    protected $stepName;

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
        foreach ($value as $k => $v) {
            $mergeType = $v['merge_type'];
            $staff = $v['approvers']['staff'];
            $roles = $v['approvers']['roles'];
            $departments = $v['approvers']['departments'];
            if ($mergeType == 1 &&(count($staff) > 1 ||  count($roles) > 0 ||  count($departments) > 0)) {
                $this->stepName = $v['name'];
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
        return ':attribute"'.$this->stepName.'"合并类型为必须时，只能配置一个审批人';
    }
}
