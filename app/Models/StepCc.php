<?php

namespace App\Models;

use App\Models\Traits\ListScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StepCc extends Model
{
    use SoftDeletes,ListScopes;
    protected $table = 'step_cc';
    protected $fillable = [
        'step_run_id',
        'step_id',
        'step_name',
        'flow_id',
        'flow_name',
        'flow_run_id',
        'form_id',
        'data_id',
        'staff_sn',
        'staff_name'
    ];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
