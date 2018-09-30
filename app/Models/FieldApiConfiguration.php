<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldApiConfiguration extends Model
{
    use SoftDeletes;
    protected $table = 'field_api_configuration';
    protected $fillable = [
        'name',
        'url',
        'value',
        'text'
    ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
