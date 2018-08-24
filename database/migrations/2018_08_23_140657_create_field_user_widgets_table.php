<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldUserWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_user_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('field_id')->comment('字段ID')->index();
            $table->unsignedInteger('oa_id')->comment('员工ID、部门ID、店铺ID');
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
        Schema::dropIfExists('field_user_widgets');
    }
}
