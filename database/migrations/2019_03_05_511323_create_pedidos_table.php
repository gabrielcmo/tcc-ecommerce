<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtd');
            $table->timestamps();
            
            $table->integer('id_produto')->unsigned();
            $table->integer('id_user')->unsigned();
        });
        
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('id_produto')->references('id')
                ->on('produtos')->onDelete('cascade')->onUpdate('cascade');
                
            $table->foreign('id_user')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
