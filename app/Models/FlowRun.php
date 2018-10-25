<?php

namespace App\Models;

use App\Models\Traits\ListScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlowRun extends Model
{
    use SoftDeletes;
    use ListScopes;

    protected $table = 'flow_run';
    protected $hidden = ['deleted_at'];
    protected $fillable = ['flow_id', 'flow_type_id', 'form_id', 'name', 'creator_sn', 'creator_name', 'status', 'end_at', 'process_instance_id'];

    public function stepRun()
    {
        return $this->hasMany('App\Models\StepRun', 'flow_run_id');
    }

    public function flow()
    {
        return $this->belongsTo(Flow::class);
    }
}
