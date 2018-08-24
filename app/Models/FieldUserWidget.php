<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldUserWidget extends Model
{
    protected $table = 'field_user_widgets';
    public $timestamps = false;
    protected $fillable = [
      'field_id',
      'oa_id',
    ];
}
