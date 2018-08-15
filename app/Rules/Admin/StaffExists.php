<?php

namespace App\Rules\Admin;

use App\Services\OA\OaApiService;
use Illuminate\Contracts\Validation\Rule;

class StaffExists implements Rule
{
    protected $msg;
    protected $title;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
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
        $oaApiService = new OaApiService();
        if ($value) {
            $filters = 'filters=staff_sn=[' . implode(',', $value) . '];status_id>=0';
            $result = $oaApiService->getStaff($filters);
            $users = array_pluck($result, 'staff_sn');
            $exceptUser = array_diff($value, $users);
            if (!empty($exceptUser)) {
                $this->msg = $this->title . '：' . implode(',', $exceptUser) . '员工不存在';
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
