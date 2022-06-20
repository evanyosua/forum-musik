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
            $table->increments('id');
            $table->string('image')->default("default.jpeg");
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('role', ['member', 'admin'])->default('member');
            $table->string('password');
            $table->string("date_of_birth")->nullable();
            $table->string("home_address")->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('genre_fav1')->nullable();
            $table->string('genre_fav2')->nullable();
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
