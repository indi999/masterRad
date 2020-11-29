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
            $table->id('id');
            $table->integer('number')->unique();
            $table->unsignedInteger('user_id'); // user id
            $table->string('brand');
            $table->string('client');
            $table->string('sale');
            $table->string('desc');

            $table->boolean('status')->default(true);

            $table->string('date_end');
            $table->string('time_end');
            $table->string('expected_date_end');
            $table->string('expected_time_end');

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
