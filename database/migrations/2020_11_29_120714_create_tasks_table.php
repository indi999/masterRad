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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('number')->unique();
            $table->unsignedInteger('user_id');  //manager(users)
            $table->string('brand');
            $table->string('client');
            $table->unsignedInteger('saller_id'); //saller(users)
            $table->longText('desc');

            // Date end
            $table->date('date_end');
            $table->date('expected_date_end');
            $table->boolean('status')->default(false);
            $table->boolean('delete')->default(false); //delete

            // Who created
            $table->string('created_id')->unsign();
            $table->string('modified_id')->unsign();

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
