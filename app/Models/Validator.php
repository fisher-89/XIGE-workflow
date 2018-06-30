<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Validator extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'type','params'];

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'fields_has_validators','validator_id','field_id');
    }
}
