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
            $table->string('webName');
            $table->string('slug');
            $table->string('brand');
            $table->string('colour');
            $table->text('fullDescription');
            $table->string('description');
            $table->foreignId('category_id')->constrained();
            $table->binary('imagePath');
            $table->string('visibleToCustomer');
            $table->integer('retailPriceGBP');
            $table->integer('retailPriceEUR');
            $table->integer('sellPriceGBP');
            $table->integer('sellPriceEUR');
            $table->float('weight');
            $table->integer('vatRate');
            $table->bigInteger('barCode');
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
