<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultValueCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_value_calculations', function (Blueprint $table) {
            $table->engine = 'MyISAM';
//            $table->increments('id');
            $table->unsignedInteger('id');
            $table->char('code',10)->default('')->comment('计算的类型');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_value_calculations');
    }
}
