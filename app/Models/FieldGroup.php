<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    protected $fillable = [
        'form_id',
        'title',
        'top',
        'bottom',
        'left',
        'right',
        'background'
    ];
}
