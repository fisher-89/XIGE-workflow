<?php

namespace App\Models;


use App\Models\Auth\AuthRole;
use App\Models\Auth\AuthStaffHasRole;
use App\Models\Traits\ListScopes;
use App\Services\Admin\Auth\RoleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Form extends Model
{
    use SoftDeletes;
    use ListScopes;

    protected $fillable = [
        'name',
        'description',
        'form_type_id',
        'number',
        'sort',
        'pc_template',
        'mobile_template'
    ];
    protected $hidden = ['deleted_at'];
    protected $appends = ['handle_id'];

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

    public function fieldGroups()
    {
        return $this->hasMany(FieldGroup::class);
    }

    /**
     * 获取表单权限的操作ID
     * @return array
     */
    public function getHandleIdAttribute()
    {
        //超级管理员
        $role = new RoleService();
        $super = $role->getSuperStaff();
        $handleIds = [1,2,3];
        if (empty($super) || ($super && (!in_array(Auth::id(), $super)))){
            $userRoleIds = AuthStaffHasRole::where('staff_sn', Auth::id())->pluck('role_id')->all();
            $roleData = AuthRole::find($userRoleIds);
            $handleIds = $roleData->map(function($role){
                $number = array_pluck($role->handle_form,'number');
                if(in_array($this->attributes['number'],$number)){
                    return $role->handle_form_type;
                }
            });
            $handleIds = $handleIds->collapse()->all();
            $handleIds = array_unique($handleIds);
        }
        return $handleIds;
    }
}
