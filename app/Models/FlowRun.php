<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlowRun extends Model
{
    use SoftDeletes;

    protected $table = 'flow_run';
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $fillable = ['flow_id', 'flow_type_id', 'form_id', 'name', 'creator_sn', 'creator_name', 'status'];

    public function stepRun()
    {
        return $this->hasMany('App\Models\StepRun', 'flow_run_id');
    }
}
