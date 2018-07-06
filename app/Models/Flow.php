<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flow extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'flow_type_id', 'form_id', 'sort', 'is_active', 'start_callback_uri', 'end_callback_uri'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $appends = ['flows_has_staff', 'flows_has_roles', 'flows_has_departments'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function departments()
    {
        return $this->hasMany(FlowHasDepartment::class);
    }

    public function roles()
    {
        return $this->hasMany(FlowHasRole::class);
    }

    public function staff()
    {
        return $this->hasMany(FlowHasStaff::class);
    }

//    public function flowsHasStaff()
//    {
//        return $this->hasMany(FlowHasStaff::class);
//    }
//
//    public function flowsHasRoles()
//    {
//        return $this->hasMany(FlowHasRole::class);
//    }
//
//    public function flowsHasDepartments()
//    {
//        return $this->hasMany(FlowHasDepartment::class);
//    }
    public function subSteps()
    {
        return $this->hasMany(SubStep::class);
    }

    public function scopeDetail($query)
    {
        $query->with(['steps']);
    }

    public function withDetail()
    {
        return $this->load(['steps']);
    }

    public function getFlowsHasStaffAttribute()
    {
        return FlowHasStaff::where('flow_id', $this->attributes['id'])->get()->pluck('staff_sn');
    }

    public function getFlowsHasRolesAttribute()
    {
        return FlowHasRole::where('flow_id', $this->attributes['id'])->get()->pluck('role_id');
    }

    public function getFlowsHasDepartmentsAttribute()
    {
        return FlowHasDepartment::where('flow_id', $this->attributes['id'])->get()->pluck('department_id');
    }
}
