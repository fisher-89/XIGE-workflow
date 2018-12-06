<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class AuthRoleHasHandle extends Model
{
    protected $fillable = [
        'role_id',
        'handle_id'
    ];
}
