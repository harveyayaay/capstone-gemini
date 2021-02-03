<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerformanceRanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('performance_ranges', function (Blueprint $table) {
          $table->id();
          $table->integer('metricid')->unsigned();
          $table->foreign('metricid')
            ->references('id')
            ->on('metrics')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          $table->float('range');
          $table->string('from');
          $table->string('to');
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
