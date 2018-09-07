<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'name', 'description', 'type', 'is_checkbox', 'condition', 'region_level', 'max', 'min', 'scale', 'default_value', 'options', 'form_id', 'form_grid_id', 'sort'];
    protected $appends = ['validator_id', 'available_options'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'options' => 'array',
    ];


    public function validator()
    {
        return $this->belongsToMany(Validator::class, 'fields_has_validators', 'field_id', 'validator_id');
    }

    public function grid()
    {
        return $this->belongsTo(FormGrid::class, 'form_grid_id', 'id');
    }

    /**
     * 员工、部门、店铺控件ID
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function widgets()
    {
        return $this->hasMany(FieldUserWidget::class);
    }

    public function getValidatorIdAttribute()
    {
        return $this->validator->pluck('id')->toArray();
    }

    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = json_encode($value);
    }

    public function setDefaultValueAttribute($value)
    {
        if (is_array($value)){
            $this->attributes['default_value'] = json_encode($value);
        }else{
            $this->attributes['default_value'] = $value;
        }

    }

    public function getDefaultValueAttribute($value)
    {
        if ($value) {
            if (in_array($this->type, ['select', 'array', 'region', 'staff', 'department', 'shop'])) {
                return json_decode($value, true);
            }
        }
        return $value;
    }

    public function getAvailableOptionsAttribute()
    {
        $data = $this->widgets->map(function ($item) {
            return $item->only(['value', 'text']);
        });
        return $data;
    }
}
