<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id')->comment('表单ID')->index();
            $table->char('title',20)->comment('标题')->default('');
            $table->unsignedSmallInteger('top')->comment('头部位置')->nullable();
            $table->unsignedSmallInteger('bottom')->comment('底部位置')->nullable();
            $table->unsignedSmallInteger('left')->comment('左边位置')->nullable();
            $table->unsignedSmallInteger('right')->comment('右边位置')->nullable();
            $table->char('background',20)->comment('背景')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_groups');
    }
}
