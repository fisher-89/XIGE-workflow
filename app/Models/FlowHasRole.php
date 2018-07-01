<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlowHasRole extends Model
{
    protected $table = 'flows_has_roles';
    public $timestamps = false;
    protected $fillable = ['flow_id', 'role_id'];
}
