<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepManagerApproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_manager_approvers', function (Blueprint $table) {
//            $table->increments('id');
            $table->unsignedInteger('step_id')->comment('步骤ID');
            $table->char('approver_manager',50)->comment('审批管理者 department_manager 部门负责人，shop_manager 店长');
            $table->primary('step_id');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_manager_approvers');
    }
}
