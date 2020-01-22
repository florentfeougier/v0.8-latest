<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boites', function (Blueprint $table) {
    $table->bigIncrements('id');
          $table->string('slug');
          $table->string('name');
          $table->string('description')->nullable();
          $table->longText('content')->nullable();

          $table->string('meta_desc')->nullable();
          $table->string('meta_title')->nullable();
          $table->string('thumbnail')->nullable()->default('storage/box/box-surprise.jpg');
          $table->string('picture_one')->nullable();
          $table->string('picture_two')->nullable();


          $table->decimal('price');
          $table->integer('product_quantity')->default(6);
          $table->integer('width')->nullable();
          $table->integer('height')->nullable();
          $table->integer('length')->nullable();
          $table->decimal('weight')->nullable();
          $table->decimal('tax')->nullable();
          $table->decimal('old_price')->nullable();
          $table->integer('stock')->nullable()->default(0);
          $table->integer('sold')->nullable()->default(0);

          $table->boolean('store_enabled')->default(false);

          $table->string('fb_event_url')->nullable()->default("https://facebook/plantesaddict.fr");
          $table->string('color_code')->nullable()->default('#ee8896');
          $table->boolean('is_public')->default(false);
          $table->integer('status')->default(0);
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
        Schema::dropIfExists('boites');
    }
}
