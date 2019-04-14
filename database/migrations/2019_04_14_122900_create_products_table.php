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
            $table->increments('id');
            $table->string('name');
            $table->string('short_desc');
            $table->string('desc');
            $table->integer('qtd_last');
            $table->double('weight', 5, 1);
            $table->double('width', 4, 1);
            $table->double('height', 4, 1);
            $table->integer('category_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->integer('cart_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('image_id')->references('id')->on('product_images')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
