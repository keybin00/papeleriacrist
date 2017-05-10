<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('devices', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('category');
          $table->string('is_complete');
          $table->string('status');
          $table->string('rented');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        chema::dropIfExists('users');
    }
}
