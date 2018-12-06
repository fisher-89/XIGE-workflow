<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthFlowAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_flow_auths', function (Blueprint $table) {
            $table->increments('id');
//            $table->timestamps();
            $table->unsignedInteger('flow_number')->comment('流程编号')->index();
            $table->unsignedInteger('role_id')->comment('角色ID')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_flow_auths');
    }
}
