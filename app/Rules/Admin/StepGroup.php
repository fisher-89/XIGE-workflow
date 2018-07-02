<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;

class StepGroup implements Rule
{
    protected $msg = '流程逻辑错误';

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
        $startCount = 0;
        $endCount = 0;
        foreach ($value as $k => $v) {
            if (empty($v['prev_step_key'])) {
                $startCount++;
            } else {
                $prevStep = $this->getPrevStep($v, $value);
                if (!$prevStep) {
                    $this->msg = $v['name'] . ' 的上一步骤配置错误';
                    return $prevStep;
                }
            }
            if (empty($v['next_step_key'])) {
                $endCount++;
            } else {
                $nextStep = $this->getNextStep($v, $value);
                if (!$nextStep) {
                    $this->msg = $v['name'] . ' 的下一步骤配置错误';
                    return $nextStep;
                }
            }
        }

        return $startCount == 1 && $endCount == 1;
    }

    private function getPrevStep($v, $value)
    {
        $stepKey = $v['step_key'];
        $prevStepKey = $v['prev_step_key'];
        foreach ($value as $key => $item) {
            if (in_array($item['step_key'], $prevStepKey)) {
                if (!in_array($stepKey, $item['next_step_key'])) {
                    return false;
                }
            }

        }
        return true;
    }

    private function getNextStep($v, $value)
    {
        $stepKey = $v['step_key'];
        $nextStepKey = $v['next_step_key'];
        foreach ($value as $key => $item) {
            if (in_array($item['step_key'], $nextStepKey)) {
                if (count($item['prev_step_key']) > 1 && $item['merge_type'] == 1 && count($nextStepKey) > 1) {
                    return false;
                }
                if (!in_array($stepKey, $item['prev_step_key'])) {
                    return false;
                }
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
