<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criacao tabela Categoria
        Schema::create('categoria', function(Blueprint $table){
			$table->increments('codCategoria');
			$table->string('nome', 60)->unique()->nullable(false);
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
        // Limpando tabela Categoria
        Schema::drop('categoria');
    }
}
