<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY

            $table->string('description');

            $table->bigInteger('cashier_status_id')->unsigned();                 //FOREIGN KEY
            // ADDING FOREIGN KEY
            $table->foreign('cashier_status_id')->references('id')->on('cashier_statuses');            

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
        Schema::dropIfExists('cashiers');
    }
}
