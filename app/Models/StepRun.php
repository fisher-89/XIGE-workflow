<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepRun extends Model
{
    protected $table = 'step_run';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['step_id', 'step_name', 'flow_id', 'flow_name', 'flow_run_id', 'form_id', 'data_id', 'approver_sn', 'approver_name', 'checked_at', 'action_type', 'acted_at', 'remark'];

    public function steps(){
        return $this->belongsTo('App\Models\Step','step_id');
    }
}
