<?php

namespace App\Models\Auth;

use App\Models\Flow;
use Illuminate\Database\Eloquent\Model;

class AuthFlowAuth extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'flow_number',
        'role_id',
    ];

    public function flow()
    {
        return $this->belongsTo(Flow::class, 'flow_number', 'number')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'description', 'number')
            ->orderBy('created_at', 'desc')
            ->limit(1);
    }
}
