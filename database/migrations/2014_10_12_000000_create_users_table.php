<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('ID');
            $table->string('UserUniqueID')->nullable();
            $table->integer('DesignationID')->nullable();
            $table->string('Username')->nullable();
            $table->string('Email')->unique();
            $table->string('Password')->nullable();
            $table->string('Avatar')->default('http://ec2-54-218-25-237.us-west-2.compute.amazonaws.com/avatar.png');
            $table->boolean('Active')->default(true);
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
        Schema::drop('users');
    }
    
    
}
