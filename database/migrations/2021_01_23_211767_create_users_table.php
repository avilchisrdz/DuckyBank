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
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY
            
            $table->string('rfc')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->bigInteger('role_id')->unsigned()->default('2'); //Administrador > 1 //FOREIGN KEY
            $table->bigInteger('user_status_id')->unsigned()->default('1');                 //FOREIGN KEY

            // ADDING FOREIGN KEY
            $table->foreign('role_id')->references('id')->on('roles'); 
            $table->foreign('user_status_id')->references('id')->on('user_statuses');            
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
