<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepManagerApprover extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'step_id',
        'approver_manager'
    ];
}
