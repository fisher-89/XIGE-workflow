<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthRole extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_super'
    ];

    protected $appends = ['handle'];

    public function staff()
    {
        return $this->belongsToMany(AuthStaff::class,'auth_staff_has_roles','role_id','staff_sn');
    }

    public function roleHasHandle()
    {
        return $this->belongsToMany(AuthHandle::class,'auth_role_has_handles','role_id','handle_id');
    }

    public function flowAuth()
    {
        return $this->hasMany(AuthFlowAuth::class,'role_id');
    }
//
    public function formAuth()
    {
        return $this->hasMany(AuthFormAuth::class,'role_id');
    }

    public function getHandleAttribute()
    {
        return AuthRoleHasHandle::where('role_id',$this->attributes['id'])->pluck('handle_id');
    }
}
