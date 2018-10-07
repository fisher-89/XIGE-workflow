<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepDepartmentApprover extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'step_approver_id',
      'department_id',
      'department_name',
      'approver_staff',
      'approver_roles',
      'approver_departments'
    ];
    protected $casts =[
        'approver_staff'=>'array',
        'approver_roles'=>'array',
        'approver_departments'=>'array',
    ];
}
