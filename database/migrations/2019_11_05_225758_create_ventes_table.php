<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('slug');
          $table->string('name');

          $table->string('description')->nullable();
          $table->longText('content')->nullable();
          $table->datetime('date')->nullable();
          $table->string('horaires')->nullable();

          $table->string('meta_desc')->nullable();
          $table->string('meta_title')->nullable();
          $table->string('thumbnail')->nullable()->default('storage/ventes/lyon.jpg');

          $table->string('location_address')->nullable();
          $table->string('location_address_info')->nullable();
          $table->string('location_city')->nullable();
          $table->integer('location_postalcode')->nullable();
          $table->integer('location_county')->nullable();
          $table->string('location_state')->nullable()->default('Auvergne-Rhône-Alpes');
          $table->string('location_country')->nullable()->default('fr');
          $table->string('fb_event_id')->nullable();
          $table->string('fb_event_url')->nullable()->default("https://facebook/plantesaddict.fr");
          $table->string('color_code')->nullable()->default('#ee8896');
          $table->boolean('show_location')->default(false);
          $table->boolean('show_date')->default(false);
          $table->boolean('is_public')->default(false);
          $table->string('status')->default("private");
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
        Schema::dropIfExists('ventes');
    }
}
