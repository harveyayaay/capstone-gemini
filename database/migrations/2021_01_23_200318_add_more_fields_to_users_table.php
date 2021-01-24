<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->renameColumn('name', 'firstname');
          $table->string('lastname');
          $table->string('username')->unique();
          $table->string('email')->nullable()->change();
          $table->string('contact')->unique();
          $table->string('hiredate')->nullable();
          $table->string('position');
          $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
          //
      });
    }
}
