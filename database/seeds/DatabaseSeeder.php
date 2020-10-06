<?php

use Illuminate\Database\Seeder;

/**
 * Classe Seeders das tabelas do Sistema
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Usuário
        DB::table('users')->insert(["name" => "Teste", "email" => "teste@teste.com", "password" => Hash::make("teste"), "created_at" => now()]);
		
		// Categorias
		$codCategoria = DB::table('categoria')->insertGetId(["nome" => "Distintivos de Progressão", "created_at" => now()]);
        DB::table('categoria')->insert(["nome" => "Distintivos de Especialidades", "created_at" => now()]);
        DB::table('categoria')->insert(["nome" => "Distintivos de Modalidade", "created_at" => now()]);
        
        // Produto
        DB::table('produto')->insert([
            "nome" => "DISTINTIVO PATA-TENRA - RAMO LOBINHO",
            "descricao" => "Distintivos de progressão pessoal no Ramo Lobinho, que deverão ser usados na manga esquerda da camisa, na altura do terço médio, centralizados.",
            "quantidadeMinima"=> "4",
            "codCategoria" => $codCategoria,
            "created_at" => now()
        ]);
		DB::table('produto')->insert([
            "nome" => "DISTINTIVO SALTADOR - RAMO LOBINHO",
            "descricao" => "Distintivos de progressão pessoal no Ramo Lobinho, que deverão ser usados na manga esquerda da camisa, na altura do terço médio, centralizados.",
            "quantidadeMinima"=> "3",
            "codCategoria" => $codCategoria,
            "created_at" => now()
        ]);
        DB::table('produto')->insert([
            "nome" => "DISTINTIVO RASTREADOR - RAMO LOBINHO",
            "descricao" => "Distintivos de progressão pessoal no Ramo Lobinho, que deverão ser usados na manga esquerda da camisa, na altura do terço médio, centralizados.",
            "quantidadeMinima"=> "2",
            "codCategoria" => $codCategoria,
            "created_at" => now()
        ]);        
        DB::table('produto')->insert([
            "nome" => "DISTINTIVO CACADOR - RAMO LOBINHO",
            "descricao" => "Distintivos de progressão pessoal no Ramo Lobinho, que deverão ser usados na manga esquerda da camisa, na altura do terço médio, centralizados.",
            "quantidadeMinima"=> "1",
            "codCategoria" => $codCategoria,
            "created_at" => now()
        ]);
    }
}
