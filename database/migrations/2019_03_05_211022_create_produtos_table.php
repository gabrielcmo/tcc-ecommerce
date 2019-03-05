<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc');
            $table->double('value', 6, 2);
            $table->timestamps();
            
            $table->integer('id_categoria')->unsigned();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('id_categoria')->references('id')
                ->on('categorias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
