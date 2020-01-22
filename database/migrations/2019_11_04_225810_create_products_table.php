<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('sku')->unique();
          $table->string('slug')->unique();
          $table->string('name');

          $table->string('thumbnail')->nullable()->default('storage/products/product.jpg');
          $table->string('picture_one')->nullable();
          $table->string('picture_two')->nullable();
          $table->string('video')->nullable();
          $table->string('color_code')->nullable()->default('#ee8896');
          $table->mediumText('description');
          $table->mediumText('specs')->nullable();
          $table->string('meta_title')->nullable()->nullable();
          $table->string('meta_desc')->nullable()->nullable();


          $table->decimal('price');
          $table->integer('height')->nullable();
          $table->decimal('weight')->nullable();
          $table->decimal('tax')->nullable();
          $table->decimal('old_price')->nullable();
          $table->integer('stock')->nullable()->default(0);
          $table->integer('sold')->nullable()->default(0);

          $table->boolean('store_enabled')->default(false);

          $table->bigInteger('productlabel_id')->unsigned()->nullable();
          $table->foreign('productlabel_id')->references('id')
                             ->on('productlabels')->onDelete('cascade');

          $table->bigInteger('productcategorie_id')->unsigned()->nullable();
          $table->foreign('productcategorie_id')->references('id')
                             ->on('productcategories')->onDelete('cascade');
                             $table->datetime('deleted_at')->nullable();

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
        Schema::dropIfExists('products');
    }
}
