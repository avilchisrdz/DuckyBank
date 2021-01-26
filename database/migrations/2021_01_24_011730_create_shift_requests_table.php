<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY

            $table->bigInteger('cashier_id')->unsigned()->unique();                 //FOREIGN KEY

            $table->bigInteger('shift_id')->unsigned()->unique();                 //FOREIGN KEY
            // ADDING FOREIGN KEY
            $table->foreign('cashier_id')->references('id')->on('cashiers'); 
            $table->foreign('shift_id')->references('id')->on('shifts');

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
        Schema::dropIfExists('shift_requests');
    }
}
