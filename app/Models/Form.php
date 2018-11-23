<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description','form_type_id','number','sort'];
    protected $hidden = ['deleted_at'];

    /**
     * 表单所有字段（包含控件字段）
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(Field::class)->orderBy('sort','asc');
    }

    /**
     * 表单字段
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formFields()
    {
        return $this->hasMany(Field::class)->whereNull('form_grid_id')->orderBy('sort');
    }

    public function flows()
    {
        return $this->hasMany(Flow::class);
    }

    public function grids()
    {
        return $this->hasMany(FormGrid::class);
    }
}
