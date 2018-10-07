<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StepApprover extends Model
{
    use SoftDeletes;
    protected $fillable = [
      'name',
      'description'
    ];

    public function departments()
    {
        return $this->hasMany(StepDepartmentApprover::class);
    }
}
