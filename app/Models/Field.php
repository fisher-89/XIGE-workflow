<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function validators()
    {
        return $this->belongsToMany(Validator::class, 'fields_has_validators', 'field_id', 'validator_id');
    }

    public function grid(){
        return $this->belongsTo(FormGrid::class,'form_grid_id','id');
    }

    public function getOptionsAttribute($value){
        return json_decode($value,true);
    }
}
