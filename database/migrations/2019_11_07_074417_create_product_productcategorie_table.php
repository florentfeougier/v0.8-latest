<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProductcategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_productcategorie', function (Blueprint $table) {
          
          $table->bigInteger('product_id')->unsigned()->nullable();
           $table->foreign('product_id')->references('id')
                 ->on('products')->onDelete('cascade');

           $table->bigInteger('productcategorie_id')->unsigned()->nullable();
           $table->foreign('productcategorie_id')->references('id')
                 ->on('productcategories')->onDelete('cascade');
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
        Schema::dropIfExists('product_productcategorie');
    }
}
