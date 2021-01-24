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
            $table->string('type');
            $table->string('client_id');
            $table->date('date_received');
            $table->time('time_start');
            $table->time('time_hold');
            $table->time('time_continue');
            $table->time('time_end');
            $table->string('process_duration');
            $table->string('hold_duration');
            $table->string('status');
            // employee id
            $table->integer('empid')->unsigned();
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
