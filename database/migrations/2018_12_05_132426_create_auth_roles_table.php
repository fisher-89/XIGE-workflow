<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('角色名称');
            $table->unsignedTinyInteger('is_super')->comment('是否超级管理员 0否 1是')->index()->default(0);
            $table->text('handle_flow')->comment('可操作流程')->nullable();
            $table->text('handle_flow_type')->comment('可操作流程类型 1查看、2编辑、3删除')->nullable();
            $table->text('handle_form')->comment('可操作表单')->nullable();
            $table->text('handle_form_type')->comment('可操作表单类型 1查看、2编辑、3删除')->nullable();
            $table->text('export_flow')->comment('可导出流程')->nullable();
            $table->text('export_form')->comment('可导出表单')->nullable();
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
        Schema::dropIfExists('auth_roles');
    }
}
