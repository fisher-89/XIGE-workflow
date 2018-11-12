<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrontabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crontabs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('type',20)->comment('定时任务类型');
            $table->char('year',10)->comment('年');
            $table->char('month',10)->comment('月');
            $table->enum('status',[0,1])->comment('状态');
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
        Schema::dropIfExists('crontabs');
    }
}
