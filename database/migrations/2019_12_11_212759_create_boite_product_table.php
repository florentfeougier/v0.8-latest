<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateboiteProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boite_product', function (Blueprint $table) {
             $table->bigInteger('product_id')->unsigned()->nullable();
             $table->foreign('product_id')->references('id')
                   ->on('products')->onDelete('cascade');
        //$table->integer('quantity')->nullable();
             $table->bigInteger('boite_id')->unsigned()->nullable();
             $table->foreign('boite_id')->references('id')
                   ->on('boites')->onDelete('cascade');
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
        Schema::dropIfExists('boite_product');
    }
}
