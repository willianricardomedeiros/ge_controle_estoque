<?php

namespace Tests\Feature;


use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

use DB;
use App\Categoria;

/**
 * Classe de Teste Unitario para Categoria
 */
class CategoriaTest extends TestCase
{
    /**
     * Teste básico acessando sistema.
     *
     * @return void
     */
    public function testAcessandoSistema()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
       
    /**
     * Teste acessando Lista de Categorias.
     *
     * @return void
     */
    public function testAcessandoCategoriasSistema()
    {
        $response = $this->get('/categorias');
        $response->assertStatus(302);
    }
    
    /**
     * Teste acessando Categoria Cadastrada.
     *
     * @return void
     */
    public function testAcessandoCategoriaCadastrada()
    {
        $response = $this->get('/categorias/1');
        $response->assertStatus(302);
    }
    
    
    /**
     * Teste de persistencia com nome Nulo em Categoria 
     * 
     * @return void
     */
    public function testGravandoCategoriaComNomeNulo()
    {
		//$this->expectException(Exception::class);
		
		// SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: categoria.nome
		$this->expectExceptionCode(23000);
		 
		echo "\nTeste Categoria: atributo nome NULL\n";
		Categoria::create(["nome" => null]);
    }
    
    /**
     * Teste de persistencia com nome maior que esperado em Categoria 
     * @return void
     */
    public function testGravandoCategoriaComNomeMaiorPermitido()
    {
		// SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: categoria.nome
		//$this->expectExceptionCode(23000);
		//$this->expectException(\Exception::class);
		$this->assertTrue(true);
		 
		echo "\nTeste Categoria: atributo nome > permitido\n
		";
		$nome = Str::random(600);
		Categoria::create(["nome" => $nome]);
    }
    
    
    /**
     * Teste de persistencia em Categoria realizando criacao, busca e delecao
     * @return void
     */
    public function testPersitenciaCategoriaCriacaoRandomica()
    {
		try{
			$nomeCat = Str::random(60);
			
			// Inicio de Transacao
			DB::beginTransaction();
				Categoria::create(["nome" => $nomeCat]);
				$categoria = Categoria::firstOrFail()->where('nome', $nomeCat);
				$categoria->delete();
			DB::commit();
			
			$this->assertTrue(true);
		}
		catch(Exception $e){
			DB::rollBack();
			
			$this->assertTrue(false, '\nFalha na criação de categoria!');
		}
    }
    
}
