<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('current_date');
            $table->integer('task_lists_id')->unsigned(); // task list id
            $table->foreign('task_lists_id')
            ->references('id')
            ->on('task_lists');
            $table->string('case_num');
            $table->date('date_received');
            $table->dateTime('time_start');
            $table->dateTime('time_continue');
            $table->dateTime('time_end');
            $table->string('process_duration')->nullable();
            $table->string('hold_duration')->nullable();
            $table->string('status');
            $table->integer('empid')->unsigned(); // employee id
            $table->foreign('empid')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('tasks');
    }
}
