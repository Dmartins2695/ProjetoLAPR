<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('usedPoints')->default(0);
            $table->string('status')->default(false);
            $table->float('amount', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('payment_id')
                ->references('id')
                ->on('payments');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
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
