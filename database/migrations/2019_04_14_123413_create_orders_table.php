<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->float('value_total', 5, 2);
            $table->float('frete', 5, 2);
            $table->integer('prazo');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('order_statuses')
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
        Schema::dropIfExists('orders');
    }
}
