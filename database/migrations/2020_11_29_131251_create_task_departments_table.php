<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('task_id'); // task id, bigInteger('task_id')->unsigned()
            $table->unsignedInteger('department_id'); // sektor id

            $table->timestamps();

            //$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            //$table->foreign('deparment_id')->references('id')->on('deparments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_departments');
    }
}

