<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthStaffHasRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_staff_has_roles', function (Blueprint $table) {
            $table->unsignedMediumInteger('staff_sn')->index()->comment('员工ID');
            $table->unsignedInteger('role_id')->index()->comment('角色ID');
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
        Schema::dropIfExists('auth_staff_has_roles');
    }
}
