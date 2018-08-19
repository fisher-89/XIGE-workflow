<?php

namespace App\Models;

use App\Models\Traits\ListScopes;
use Illuminate\Database\Eloquent\Model;

class StepRun extends Model
{
    use ListScopes;

    protected $table = 'step_run';
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $fillable = ['step_id', 'step_key','step_name','flow_type_id', 'flow_id', 'flow_name', 'flow_run_id', 'form_id', 'data_id', 'approver_sn', 'approver_name', 'checked_at', 'action_type', 'acted_at', 'remark','record'];

    public function steps(){
        return $this->belongsTo('App\Models\Step','step_id');
    }

    public function flowRun(){
        return $this->belongsTo('App\Models\FlowRun','flow_run_id');
    }
}
