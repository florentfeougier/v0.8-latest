<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverieOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverie_order', function (Blueprint $table) {
          $table->bigInteger('order_id')->unsigned()->nullable();
          $table->foreign('order_id')->references('id')
                ->on('orders')->onDelete('cascade');

          $table->bigInteger('deliverie_id')->unsigned()->nullable();
          $table->foreign('deliverie_id')->references('id')
                ->on('deliveries')->onDelete('cascade');
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
        Schema::dropIfExists('deliverie_order');
    }
}
