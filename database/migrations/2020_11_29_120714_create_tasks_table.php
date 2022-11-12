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
            $table->unsignedInteger('user_id')->unsign();;  //manager(users)
            $table->string('brand');
            $table->string('client_id')->unsign(); // Klijent id clients-table
            $table->unsignedInteger('saller_id')->default(null); //saller(users)
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
