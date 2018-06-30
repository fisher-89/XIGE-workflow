<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldsHasValidator extends Model
{
    protected $fillable = ['field_id', 'validator_id'];
    public $timestamps = false;
}
