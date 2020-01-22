<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
          $table->bigInteger('order_id')->unsigned()->nullable();
           $table->foreign('order_id')->references('id')
                 ->on('orders')->onDelete('cascade');

           $table->bigInteger('product_id')->unsigned()->nullable();
           $table->foreign('product_id')->references('id')
                 ->on('products')->onDelete('cascade');
                 $table->integer('quantity');
                 $table->decimal('price');
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
        Schema::dropIfExists('order_product');
    }
}
