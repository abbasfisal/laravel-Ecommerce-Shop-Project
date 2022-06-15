<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnUpdate();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnUpdate();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnUpdate();

            $table->foreignId('color_id')
                  ->nullable()
                  ->constrained('colors')
                  ->cascadeOnUpdate();

            $table->foreignId('size_id')
                  ->nullable()
                  ->constrained('sizes')
                  ->cascadeOnUpdate();

            $table->string('count')
                  ->default(1);


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
        Schema::dropIfExists('order_items');
    }
}
