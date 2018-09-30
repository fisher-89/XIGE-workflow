<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldApiConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_api_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',20)->comment('字段接口配置名称');
            $table->string('url')->comment('字段接口配置地址');
            $table->char('value',50)->comment('字段接口配置的value值 (字段)');
            $table->char('text',50)->comment('字段接口配置的text值 (字段)');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name','deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_api_configuration');
    }
}
