<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashierSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashier_sessions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY

            $table->bigInteger('user_id')->unsigned()->unique();                 //FOREIGN KEY
            $table->bigInteger('cashier_id')->unsigned()->unique();                 //FOREIGN KEY
            // ADDING FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cashier_id')->references('id')->on('cashiers'); 
                                   
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('cashier_sessions');
    }
}
