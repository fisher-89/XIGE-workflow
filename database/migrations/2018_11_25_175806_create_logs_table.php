<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('staff',10)->comment('操作人工号')->index();
            $table->char('realname',10)->comment('操作人')->index();
            $table->char('method',10)->comment('请求类型 GET、POST、PUT、DELETE、PATCH')->index();
            $table->char('path',100)->comment('请求路径');
            $table->unsignedInteger('request_id')->comment('请求ID 编辑与删除')->nullable()->index();
            $table->text('after')->comment('新增或修改之后的表单数据')->nullable();
            $table->text('before')->comment('修改之前的表单数据')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
