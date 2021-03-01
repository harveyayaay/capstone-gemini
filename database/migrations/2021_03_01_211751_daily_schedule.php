<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DailySchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('daily_schedule', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('schedid')->unsigned();
          $table->foreign('schedid')
            ->references('id')
            ->on('schedules')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          $table->time('time');
          $table->integer('taskid')->unsigned();
          $table->foreign('taskid')
            ->references('id')
            ->on('task_lists')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        //
    }
}
