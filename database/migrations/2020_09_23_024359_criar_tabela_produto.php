<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Classe Migration da tabela Produto
 */
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
			$table->string('nome', 60)->unique()->nullable(false);
			$table->string('descricao', 300);
			$table->integer('quantidadeMinima')->min(0)->nullable(false);
			$table->integer('codCategoria');
			$table->timestamps();
			
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
