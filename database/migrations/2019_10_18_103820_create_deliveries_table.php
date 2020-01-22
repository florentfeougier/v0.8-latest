<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deliverie_id');
            // values:
            // todo
            // doing
            // ready
            // sent
            $table->string('status')->default('en attente de paiement');
            $table->boolean('completed')->default(0);
            $table->string('tracking_id')->nullable();
            $table->string('packet_id')->nullable();
            $table->string('pickup_id')->nullable();
            $table->string('pickup_name')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('pickup_postalcode')->nullable();
            $table->string('pickup_city')->nullable();
            $table->string('country')->default('fr');

            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')
                  ->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('deliveries');
    }
}
