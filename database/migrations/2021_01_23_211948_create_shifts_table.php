<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->engine = 'InnoDB';          
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY

            $table->string('description')->unique(); //A001 ,A002

            $table->bigInteger('procedure_id')->unsigned();                 //FOREIGN KEY
            // ADDING FOREIGN KEY
            $table->foreign('procedure_id')->references('id')->on('procedures');            

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
        Schema::dropIfExists('shifts');
    }
}
