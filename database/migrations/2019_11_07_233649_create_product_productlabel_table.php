<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductlabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_productlabel', function (Blueprint $table) {
          $table->bigInteger('productlabel_id')->unsigned()->nullable();
          $table->foreign('productlabel_id')->references('id')
                ->on('productlabels')->onDelete('cascade');

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
        Schema::dropIfExists('product_productlabel');
    }
}
