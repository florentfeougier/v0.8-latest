<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payment', function (Blueprint $table) {
          $table->bigInteger('order_id')->unsigned()->nullable();
           $table->foreign('order_id')->references('id')
                 ->on('orders')->onDelete('cascade');

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
        Schema::dropIfExists('order_payment');
    }
}
