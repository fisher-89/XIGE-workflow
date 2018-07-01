<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlowHasDepartment extends Model
{
    protected $table = 'flows_has_departments';
    public $timestamps = false;
    protected $fillable = ['flow_id', 'department_id'];
}
