<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthRoleHasHandlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_role_has_handles', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
            $table->unsignedInteger('role_id')->comment('角色ID')->index();
            $table->unsignedInteger('handle_id')->index()->comment('操作ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_role_has_handles');
    }
}
