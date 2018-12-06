<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_staffs', function (Blueprint $table) {
//            $table->increments('id');
            $table->unsignedMediumInteger('staff_sn')->comment('员工编号');
            $table->primary('staff_sn');
            $table->string('name')->comment('员工姓名')->index();
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
        Schema::dropIfExists('auth_staffs');
    }
}
