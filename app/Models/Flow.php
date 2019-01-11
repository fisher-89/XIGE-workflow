<?php

namespace App\Models;

use App\Models\Auth\AuthRole;
use App\Models\Auth\AuthStaffHasRole;
use App\Models\Traits\ListScopes;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Flow extends Model
{
    use SoftDeletes;
    use ListScopes;

    protected $fillable = ['name', 'description', 'icon', 'flow_type_id', 'form_id', 'sort', 'number', 'is_active', 'start_callback_uri', 'accept_start_callback', 'end_callback_uri', 'accept_end_callback', 'send_message', 'is_client'];
    protected $hidden = ['deleted_at'];
    protected $appends = ['flows_has_staff', 'flows_has_roles', 'flows_has_departments','handle_id'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id')->withTrashed();
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

    public function getIconAttribute($value)
    {
        if ($value)
            return config('app.url') . $value;
        return $value;
    }

    /**
     * 获取流程操作权限ID
     * @return array
     */
    public function getHandleIdAttribute()
    {
        //超级管理员
        $role = new RoleService();
        $super = $role->getSuperStaff();
        $handleIds = [1,2,3];
        if (empty($super) || ($super && (!in_array(Auth::id(), $super)))){
            $userRoleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
            $roleData = AuthRole::find($userRoleIds);
            $handleIds = $roleData->map(function($role){
                $number = array_pluck($role->handle_flow,'number');
                if(in_array($this->attributes['number'],$number)){
                    return $role->handle_flow_type;
                }
            });
            $handleIds = $handleIds->collapse()->all();
            $handleIds = array_unique($handleIds);
        }
        return $handleIds;
    }
}
