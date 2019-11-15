<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('text');
            $table->integer('note');
            
            $table->integer('id_user')->unsigned();
            $table->integer('id_product')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
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
        Schema::dropIfExists('products_ratings');
    }
}
