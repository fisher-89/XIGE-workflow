<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'name', 'description', 'type', 'max', 'min', 'scale', 'default_value','options', 'is_editable', 'form_id', 'form_grid_id', 'sort'];
    protected $appends = ['validator_id'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $casts = [
      'options'=>'array',
    ];

//    public function validators()
//    {
//        return $this->belongsToMany(Validator::class, 'fields_has_validators', 'field_id', 'validator_id');
//    }

    public function validator()
    {
        return $this->belongsToMany(Validator::class, 'fields_has_validators', 'field_id', 'validator_id');
    }

    public function grid(){
        return $this->belongsTo(FormGrid::class,'form_grid_id','id');
    }

    public function getValidatorIdAttribute()
    {
        return $this->validator->pluck('id')->toArray();
    }

    public function setOptionsAttribute($value){
        $this->attributes['options'] = json_encode($value);
    }
}
