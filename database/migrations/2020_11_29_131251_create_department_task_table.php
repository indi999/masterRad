<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_late')->default(false);
            $table->boolean('is_finish')->default(false);

            $table->foreign('task_id')->references('id')->on('tasks')
                  ->onDelete('cascade');

            $table->foreign('department_id')->references('id')->on('departments')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('department_task');
    }
}

