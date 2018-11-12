<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crontab extends Model
{
    protected $fillable = [
        'type',
        'year',
        'month',
        'status',
    ];

}
