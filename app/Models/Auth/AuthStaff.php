<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthStaff extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'staff_sn';

    protected $fillable = [
        'staff_sn',
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany(AuthRole::class,'auth_staff_has_roles','staff_sn','role_id');
    }
}
