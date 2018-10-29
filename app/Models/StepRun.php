<?php

namespace App\Models;

use App\Models\Traits\ListScopes;
use Illuminate\Database\Eloquent\Model;

class StepRun extends Model
{
    use ListScopes;

    protected $table = 'step_run';
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $fillable = ['step_id', 'step_key','step_name','flow_type_id', 'flow_id', 'flow_name', 'flow_run_id', 'form_id', 'data_id', 'approver_sn', 'approver_name', 'checked_at', 'action_type', 'acted_at', 'remark','next_id','prev_id','is_send_todo'];
    protected $casts = [
      'prev_id'=>'array',
      'next_id'=>'array'
    ];

    public function steps(){
        return $this->belongsTo('App\Models\Step','step_id');
    }

    public function flowRun(){
        return $this->belongsTo('App\Models\FlowRun','flow_run_id');
    }

    public function flow(){
        return $this->belongsTo(Flow::class);
    }

    public function stepCc()
    {
        return $this->hasMany(StepCc::class);
    }
}
