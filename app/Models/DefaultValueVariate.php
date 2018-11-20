<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefaultValueVariate extends Model
{
    use SoftDeletes;

    protected $hidden = ['deleted_at'];
}
