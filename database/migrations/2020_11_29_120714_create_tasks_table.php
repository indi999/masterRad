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
            $table->integer('number')->unique();
            $table->unsignedInteger('user_id');  //manager
            $table->string('brand');
            $table->string('client');
            $table->string('sale');
            $table->longText('desc');

            $table->string('date_end');
            $table->string('time_end');
            $table->string('expected_date_end');
            $table->string('expected_time_end');

            $table->boolean('finish')->default(false);

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
