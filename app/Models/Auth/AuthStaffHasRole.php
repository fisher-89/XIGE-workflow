<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class AuthStaffHasRole extends Model
{
    protected $fillable = [
        'staff_sn',
        'role_id'
    ];
}
