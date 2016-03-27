<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserImageMessageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id'); // auto increment
            $table->string('username', 32)->default(''); // string with given max length
            $table->string('password', 64)->default('');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->default('');    
            $table->string('profile_image')->default('');
            $table->tinyInteger('privilege')->unsigned()->default(1);
            $table->timestamps();
        });
        
        Schema::create('image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned->default(0);
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade'); // when user is deleted, so is user's images
            $table->string('image_url')->default('');
            $table->string('category')->default('');
        });
        
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned->default(0);
            $table->foreign('user_id')->references('id')->on('user'); // user's messages won't be deleted when user is deleted
            $table->integer('image_id')->unsigned->default(0);
            $table->foreign('image_id')->references('id')->on('image')->onDelete('cascade'); // when image is deleted, linked messages are also
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('message');
        Schema::drop('image');
        Schema::drop('user');
    }
}