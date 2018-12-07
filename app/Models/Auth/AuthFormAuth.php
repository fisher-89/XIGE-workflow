<?php

namespace App\Models\Auth;

use App\Models\Form;
use Illuminate\Database\Eloquent\Model;

class AuthFormAuth extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'form_number',
        'role_id',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class,'form_number','number')
            ->whereNull('deleted_at')
            ->select('id','name','description','number')
            ->orderBy('created_at','desc')
            ->limit(1);
    }
    public function roleHasHandles()
    {
        return $this->hasMany(AuthRoleHasHandle::class,'role_id','role_id');
    }
}
