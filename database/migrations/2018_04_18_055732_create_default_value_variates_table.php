<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultValueVariatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_value_variates', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->char('key',50)->default('')->comment('默认值变量key')->unique();
            $table->char('name',50)->default('')->comment('默认值变量名字')->unique();
            $table->char('code',200)->default('')->comment('默认值变量php代码');
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
        Schema::dropIfExists('default_value_variates');
    }
}
