<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->foreignId('brand_id')
                  ->constrained('brands')
                  ->cascadeOnUpdate()
                  ->cascadeOnUpdate();

            $table->string('title');

            $table->string('slug');

            $table->string('price');
            //----------------------------------- for Off
            $table->string('on_sale')
                  ->nullable();

            $table->date('started_at')
                  ->nullable();

            $table->date('end_at')
                  ->nullable();
            //-------------------------------------
            $table->string('image');

            $table->string('short_description')
                  ->nullable();

            $table->text('long_description')
                  ->nullable();

            $table->string('note')
                  ->nullable();

            $table->boolean('active');
            $table->integer('stock');

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
