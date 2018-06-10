<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_steps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('flow_id')->index()->comment('流程ID');
            $table->unsignedInteger('step_key')->comment('步骤key');
            $table->unsignedInteger('parent_key')->index()->comment('父级步骤key');
//            $table->increments('id');
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
        Schema::dropIfExists('sub_steps');
    }
}
