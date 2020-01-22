<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_vente', function (Blueprint $table) {

            $table->bigInteger('order_id')->unsigned()->nullable();
             $table->foreign('order_id')->references('id')
                   ->on('orders')->onDelete('cascade');

             $table->bigInteger('vente_id')->unsigned()->nullable();
             $table->foreign('vente_id')->references('id')
                   ->on('ventes')->onDelete('cascade');
          

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
        Schema::dropIfExists('order_vente');
    }
}
