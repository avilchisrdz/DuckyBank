<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_histories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned(); //PRIMARY KEY

            $table->string("sh_shift"); //A001
            $table->string("sh_procedure"); //Deposito
            
            $table->string("t_started");        //9:00am
            $table->string("t_finished");       //9:05am
            $table->string("t_shift");          //5:minutos

            $table->bigInteger('cashier_id')->unsigned()->unique();                 //FOREIGN KEY
            $table->bigInteger('user_id')->unsigned()->unique();                 //FOREIGN KEY
            // ADDING FOREIGN KEY
            $table->foreign('cashier_id')->references('id')->on('cashiers'); 
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_histories');
    }
}
