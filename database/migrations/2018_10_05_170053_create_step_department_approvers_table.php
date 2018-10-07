<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepDepartmentApproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_department_approvers', function (Blueprint $table) {
            $table->unsignedInteger('step_approver_id')->comment('审批表ID');
            $table->unsignedInteger('department_id')->comment('部门ID');
            $table->char('department_name',100)->comment('部门名称');
            $table->text('approver_staff')->comment('审批人')->nullable();
            $table->text('approver_roles')->comment('审批角色')->nullable();
            $table->text('approver_departments')->comment('审批部门')->nullable();
            $table->foreign('step_approver_id')->references('id')->on('step_approvers');
            $table->primary(['step_approver_id','department_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_department_approvers');
    }
}
