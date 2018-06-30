<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sort'];
    protected $hidden = ['deleted_at'];

    public function form()
    {
        return $this->hasMany(Form::class);
    }
}