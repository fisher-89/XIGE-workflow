<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'staff',
        'realname',
        'method',
        'path',
        'request_id',
        'after',
        'before'
    ];
    protected $casts = [
        'after' => 'array',
        'before' => 'array'
    ];
}
