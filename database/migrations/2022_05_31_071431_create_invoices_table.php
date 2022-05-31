<?php

use App\Models\Disount;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->foreignId('discount_id')
                  ->nullable()
                  ->constrained('discounts')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->foreignId('city_id')
                  ->constrained('cities')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->foreignId('state_id')
                  ->constrained('states')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->string('address');


            $table->string('postal_code');
            $table->string('tel', 11);
            $table->string('note');
            $table->string('count');
            $table->string('paid');

            $table->enum('delivery_state', ['pending', 'shipping', 'deliverd'])
                  ->default('pending');

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
        Schema::dropIfExists('invoices');
    }
}
