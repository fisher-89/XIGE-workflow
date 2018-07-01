<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormGrid extends Model
{
    use SoftDeletes;

    protected $fillable = ['key','name','form_id'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function fields(){
        return $this->hasMany(Field::class)->orderBy('sort','asc');
    }
}
