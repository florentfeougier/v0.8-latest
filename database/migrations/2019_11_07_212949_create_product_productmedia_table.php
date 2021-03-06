<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProductmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_productmedia', function (Blueprint $table) {
          $table->bigInteger('product_id')->unsigned()->nullable();
           $table->foreign('product_id')->references('id')
                 ->on('products')->onDelete('cascade');

           $table->bigInteger('productmedia_id')->unsigned()->nullable();
           $table->foreign('productmedia_id')->references('id')
                 ->on('productmedias')->onDelete('cascade');
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
        Schema::dropIfExists('product_productmedia');
    }
}
