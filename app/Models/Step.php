<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'flow_id', 'step_key', 'prev_step_key', 'next_step_key', 'hidden_fields', 'editable_fields', 'required_fields', 'approvers', 'allow_condition', 'skip_condition', 'reject_type', 'concurrent_type', 'merge_type', 'start_callback_uri', 'checking_callback_uri', 'approved_callback_uri', 'reject_callback_uri', 'transfer_callback_uri', 'end_callback_uri','withdraw_callback_uri'];

    protected $casts = [
        'prev_step_key' => 'array',
        'next_step_key' => 'array',
        'hidden_fields' => 'array',
        'editable_fields' => 'array',
        'required_fields' => 'array',
        'approvers' => 'array',
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function flow()
    {
        return $this->belongsTo(Flow::class, 'flow_id');
    }

    public function setHiddenFieldsAttribute($value)
    {
        $this->attributes['hidden_fields'] = json_encode(array_unique($value));
    }

    public function setEditableFieldsAttribute($value)
    {
        $this->attributes['editable_fields'] = json_encode(array_unique($value));
    }

    public function setRequiredFieldsAttribute($value)
    {
        $this->attributes['required_fields'] = json_encode(array_unique($value));
    }

    public function setApproversAttribute($value)
    {
        $this->attributes['approvers'] = json_encode($value);
    }

    public function setPrevStepKeyAttribute($value)
    {
        $this->attributes['prev_step_key'] = json_encode(array_unique($value));
    }

    public function setNextStepKeyAttribute($value)
    {
        $this->attributes['next_step_key'] = json_encode(array_unique($value));
    }
}
