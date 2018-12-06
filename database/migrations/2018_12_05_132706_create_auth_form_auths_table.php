<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthFormAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_form_auths', function (Blueprint $table) {
            $table->increments('id');
//            $table->timestamps();
            $table->unsignedInteger('form_number')->comment('表单编号')->index();
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
        Schema::dropIfExists('auth_form_auths');
    }
}
