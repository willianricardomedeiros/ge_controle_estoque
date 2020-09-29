<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criacao de tabela de Produto
        Schema::create('produto', function(Blueprint $table){
			$table->increments('codProduto');
			$table->string('nome');
			$table->string('descricao');
			$table->integer('quantidadeMinima');
			$table->integer('codCategoria');
			
			$table->foreign('codCategoria')->references('codCategoria')->on('categoria');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Limpando tabela Produto
        Schema::drop('produto');
    }
}
