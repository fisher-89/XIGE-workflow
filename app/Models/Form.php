<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function fields()
    {
        return $this->hasMany(Field::class, 'form_id');
    }

    public function grid()
    {
        return $this->hasMany(FormGrid::class);
    }
}
