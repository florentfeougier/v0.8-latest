<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicheProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_product', function (Blueprint $table) {
          $table->bigInteger('fiche_id')->unsigned()->nullable();
           $table->foreign('fiche_id')->references('id')
                 ->on('fiches')->onDelete('cascade');

           $table->bigInteger('product_id')->unsigned()->nullable();
           $table->foreign('product_id')->references('id')
                 ->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('fiche_product');
    }
}
