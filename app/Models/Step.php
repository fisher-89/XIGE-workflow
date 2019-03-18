<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'flow_id',
        'step_key',
        'prev_step_key',
        'next_step_key',
        'available_fields',
        'hidden_fields',
        'editable_fields',
        'required_fields',
        'approver_type',
        'step_approver_id',
        'approvers',
        'allow_condition',
        'skip_condition',
        'reject_type',
        'concurrent_type',
        'merge_type',
        'start_callback_uri',
        'accept_start_callback',
        'check_callback_uri',
        'accept_check_callback',
        'approve_callback_uri',
        'accept_approve_callback',
        'reject_callback_uri',
        'accept_reject_callback',
        'transfer_callback_uri',
        'accept_transfer_callback',
        'end_callback_uri',
        'accept_end_callback',
        'withdraw_callback_uri',
        'accept_withdraw_callback',
        'x',
        'y',
        'send_todo',
        'send_start',
        'is_cc',
        'cc_person'
    ];

    protected $casts = [
        'prev_step_key' => 'array',
        'next_step_key' => 'array',
        'available_fields' => 'array',
        'hidden_fields' => 'array',
        'editable_fields' => 'array',
        'required_fields' => 'array',
        'approvers' => 'array',
        'cc_person' => 'array',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    public function flow()
    {
        return $this->belongsTo(Flow::class, 'flow_id');
    }

    public function stepRun()
    {
        return $this->hasMany(StepRun::class);
    }

    /**
     * 审批配置关联
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stepApprover()
    {
        return $this->hasOne(StepApprover::class);
    }

    /**
     * 配置部门关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stepDepartmentApprover()
    {
        return $this->hasMany(StepDepartmentApprover::class, 'step_approver_id', 'step_approver_id');
    }

    /**
     * 选择审批关联
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stepChooseApprover()
    {
        return $this->hasOne(StepChooseApprover::class);
    }

    /**
     * 当前管理审批关联
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stepManagerApprover()
    {
        return $this->hasOne(StepManagerApprover::class);
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
