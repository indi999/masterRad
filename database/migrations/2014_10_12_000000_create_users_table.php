<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('department_id'); // sektor id
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('is_admin')->default(false); // Administrator
            $table->string('role');   // Admin/Manager/Korisnik/Prodavac
            $table->boolean('status')->default(true); //true/false
            $table->string('image')->default("none");

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
