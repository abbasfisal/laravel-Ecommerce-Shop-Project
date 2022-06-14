<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('size_id')
                ->nullable()
                  ->references('sizes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('color_id')
                ->nullable()
                  ->references('colors')

                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->text('attributes')->nullable();

            $table->string('count');

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
        Schema::dropIfExists('baskets');
    }
}
