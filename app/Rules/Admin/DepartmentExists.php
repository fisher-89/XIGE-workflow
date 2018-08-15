<?php

namespace App\Rules\Admin;

use App\Services\OA\OaApiService;
use Illuminate\Contracts\Validation\Rule;

class DepartmentExists implements Rule
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
            $filters = 'filters=id=[' . implode(',', $value) . ']';
            $result = $oaApiService->getDepartments($filters);
            $departmentId = array_pluck($result, 'id');
            $exceptDepartmentId = array_diff($value, $departmentId);
            if (!empty($exceptDepartmentId)) {
                $this->msg = $this->title . '：' . implode(',', $exceptDepartmentId) . '不存在';
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
