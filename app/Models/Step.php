<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use SoftDeletes;

    protected $casts = [
        'prev_step_key' => 'array',
        'next_step_key' => 'array',
        'hidden_fields' => 'array',
        'editable_fields' => 'array',
        'required_fields' => 'array',
        'approvers' => 'array',
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function flow()
    {
        return $this->belongsTo(Flow::class, 'flow_id');
    }
}
