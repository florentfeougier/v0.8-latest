<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_id');

            $table->string('transaction_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('auth_number')->nullable();
            $table->string('response_code')->nullable();
            $table->string('call_number')->nullable();
            $table->string('status')->default('false');
            $table->string('info')->default('created');
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')
                               ->on('users')->onDelete('cascade');

            $table->bigInteger('order_id')->unsigned()->nullable();

            $table->foreign('order_id')->references('id')
                ->on('orders')->onDelete('cascade');

                $table->datetime('deleted_at')->nullable();

            $table->decimal('amount');
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
        Schema::dropIfExists('payments');
    }
}
