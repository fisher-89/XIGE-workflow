<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlowHasStaff extends Model
{
    protected $table = 'flows_has_staff';
    public $timestamps = false;
    protected $fillable = ['flow_id', 'staff_sn'];
}
