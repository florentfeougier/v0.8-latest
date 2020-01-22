<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_vente', function (Blueprint $table) {

            $table->bigInteger('product_id')->unsigned()->nullable();
             $table->foreign('product_id')->references('id')
                   ->on('products')->onDelete('cascade');
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('product_vente');
    }
}
