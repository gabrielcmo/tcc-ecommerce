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
            $table->string('nome');
            $table->string('descricao');
            $table->integer('qtd_restante');
            $table->double('peso', 5, 1)->nullable();
            $table->double('largura', 4, 1)->nullable();
            $table->double('comprimento', 4, 1)->nullable();
            $table->double('altura', 4, 1)->nullable();
            $table->double('diametro', 4, 1)->nullable();
            $table->float('valor', 5, 2);
            $table->integer('qtd_visto')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categories')
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