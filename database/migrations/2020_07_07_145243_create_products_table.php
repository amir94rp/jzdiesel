<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('brand_name');
            $table->string('brand_slug');
            $table->string('category_name');
            $table->string('category_slug');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->date('discount_expiration')->nullable();
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->integer('in_stock')->default(0);
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
