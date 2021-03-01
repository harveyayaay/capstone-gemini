<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('schedules', function (Blueprint $table) {
          $table->increments('id');
          $table->date('date');
          $table->time('time');
          $table->integer('empid')->unsigned();
          $table->foreign('empid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
