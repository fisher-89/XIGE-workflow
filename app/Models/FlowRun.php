<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlowRun extends Model
{
    use SoftDeletes;

    protected $table = 'flow_run';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['flow_id', 'form_id', 'name', 'creator_sn', 'creator_name', 'status'];

}
