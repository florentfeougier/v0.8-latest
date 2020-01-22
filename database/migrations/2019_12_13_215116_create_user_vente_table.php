<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vente', function (Blueprint $table) {
   $table->bigInteger('vente_id')->unsigned()->nullable();
          $table->foreign('vente_id')->references('id')
                ->on('ventes')->onDelete('cascade');

          $table->bigInteger('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_vente');
    }
}
