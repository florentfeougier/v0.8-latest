<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id')->unique();
            $table->decimal('amount');
            $table->string('cart');
            $table->boolean('closed')->default(0);

            $table->string('payment_id')->unique()->nullable();
            $table->boolean('payment_status')->default(false);
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('pickup_location')->nullable(); // Used for shop orders
            $table->string('pickup_date')->nullable(); // Used for shop orders
            $table->string('delivery_address')->nullable(); // Used for shop orders
            $table->string('delivery_store_id')->nullable(); // Used for shop orders

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                               ->on('users')->onDelete('cascade');

            $table->string('status')->default("created");

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
        Schema::dropIfExists('orders');
    }
}
