<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('slug')->unique();
          $table->string('name');
          $table->string('thumbnail')->default('storage/fiches/cactus.jpg');

          $table->mediumText('description_short')->nullable();
          $table->mediumText('description');
          $table->longText('content');
          $table->string('color_code')->nullable()->default('#ee8896');

          $table->string('arrosage_info')->nullable()->default("bla bla bla");;
          $table->string('entretien_info')->nullable()->default("bla bla bla");;
          $table->string('lumiere_info')->nullable()->default("bla bla bla");
          $table->string('meta_desc')->nullable();
          $table->string('meta_title')->nullable();
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
        Schema::dropIfExists('fiches');
    }
}
