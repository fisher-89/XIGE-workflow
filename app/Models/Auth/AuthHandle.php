<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class AuthHandle extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
