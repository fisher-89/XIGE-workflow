<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepChooseApprover extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'step_id',
        'staff',
        'departments',
        'roles'
    ];
    protected $casts = [
        'staff' => 'array',
        'roles' => 'array',
        'departments' => 'array'
    ];
}
