<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubStep extends Model
{
    public $timestamps = false;
    protected $fillable = ['flow_id', 'step_key', 'parent_key'];
}
