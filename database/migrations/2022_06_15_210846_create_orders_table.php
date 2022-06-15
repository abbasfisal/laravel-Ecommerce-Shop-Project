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
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnUpdate();

            $table->foreignId('state_id')
                  ->constrained('states')
                  ->cascadeOnUpdate();

            $table->foreignId('discount_id')
                  ->nullable()
                  ->constrained('discounts')
                  ->cascadeOnUpdate();


            $table->string('address');
            $table->string('postal_code');

            $table->string('phone', 11);

            $table->enum('status', ['new', 'paid', 'canceled', 'fail'])
                  ->default('new');

            $table->string('total')
                  ->comment('total price without calculate the Discount ');

            $table->string('discount_total')
                  ->nullable()
                  ->comment('total price with calculate the Discount');

            $table->string('tracking_code')
                  ->nullable();

            $table->string('payment_code')
                  ->nullable();

            $table->dateTime('paied_date')->nullable();

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
