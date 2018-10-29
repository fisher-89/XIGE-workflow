<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepCcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_cc', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('step_run_id')->index()->comment('步骤运行ID');
            $table->unsignedInteger('step_id')->comment('步骤ID')->index();
            $table->char('step_name',20)->comment('步骤名称');
            $table->unsignedInteger('flow_id')->comment('流程ID')->index();
            $table->char('flow_name',20)->comment('流程名称');
            $table->unsignedInteger('flow_run_id')->comment('流程运行ID')->index();
            $table->unsignedInteger('form_id')->comment('表单ID');
            $table->unsignedInteger('data_id')->comment('表单dataID');
            $table->unsignedMediumInteger('staff_sn')->comment('抄送人工号')->index();
            $table->char('staff_name',20)->comment('抄送人');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_cc');
    }
}
