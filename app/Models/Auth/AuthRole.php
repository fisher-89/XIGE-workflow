<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthRole extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_super',
        'handle_flow',
        'handle_flow_type',
        'handle_form',
        'handle_form_type',
        'export_flow',
        'export_form',
    ];

    protected $casts = [
        'handle_flow' => 'array',
        'handle_flow_type' => 'array',
        'handle_form' => 'array',
        'handle_form_type' => 'array',
        'export_flow' => 'array',
        'export_form' => 'array',
    ];


    public function staff()
    {
        return $this->belongsToMany(AuthStaff::class, 'auth_staff_has_roles', 'role_id', 'staff_sn');
    }
}
