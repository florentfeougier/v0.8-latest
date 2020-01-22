<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_user', function (Blueprint $table) {
          $table->bigInteger('user_id')->unsigned()->nullable();
           $table->foreign('user_id')->references('id')
                 ->on('users')->onDelete('cascade');

           $table->bigInteger('payment_id')->unsigned()->nullable();
           $table->foreign('payment_id')->references('id')
                 ->on('payments')->onDelete('cascade');
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
        Schema::dropIfExists('payment_user');
    }
}
