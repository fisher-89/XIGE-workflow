<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flow extends Model
{
    use SoftDeletes;
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function steps()
    {
        return $this->hasMany(Step::class, 'flow_id');
    }

    public function departments()
    {
        return $this->hasMany(FlowHasDepartment::class, 'flow_id');
    }

    public function roles()
    {
        return $this->hasMany(FlowHasRole::class, 'flow_id');
    }

    public function staff()
    {
        return $this->hasMany(FlowHasStaff::class, 'flow_id');
    }
}
