<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepChooseApproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_choose_approvers', function (Blueprint $table) {
//            $table->increments('id');
            $table->unsignedInteger('step_id')->comment('步骤ID');
            $table->text('staff')->comment('审批人')->nullable();
            $table->text('departments')->comment('部门')->nullable();
            $table->text('roles')->comment('角色')->nullable();
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
        Schema::dropIfExists('step_choose_approvers');
    }
}
