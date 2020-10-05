<?php

namespace Tests\Feature;


use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

use DB;
use App\Categoria;
use App\Produto;

/**
 * Classe de Teste Unitario para Produto
 */
class ProdutoTest extends TestCase
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
     * Teste acessando Lista de Produtos.
     *
     * @return void
     */
    public function testAcessandoProdutos()
    {
        $response = $this->get('/produtos');
        $response->assertStatus(302);
    }
    
    /**
     * Teste acessando Produto Cadastrado.
     *
     * @return void
     */
    public function testAcessandoProdutoCadastrado()
    {
        $response = $this->get('/produtos/1');
        $response->assertStatus(302);
    }

    /**
     * Teste de persistencia com nome Nulo em Categoria 
     */
    public function testGravandoProdutoComNomeNulo()
    {
		//$this->expectException(Exception::class);
		
		// SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: categoria.nome
		$this->expectExceptionCode(23000);
		 
		echo "\nTeste Protudo: atributo nome NULL\n";
		Produto::create(["nome" => null, "descricao" => null, "quantidadeMinima" => 0, "codCategoria" => 0]);
    }

    
    /**
     * Teste de persistencia em Produto realizando criacao, busca e delecao
     */
    public function testPersitenciaProdutoCriacaoRandomica()
    {
		try{
			$nomeProduto = Str::random(60);
			$codCategoria = 1;
			
			// Inicio de Transacao
			DB::beginTransaction();
				$categoria = Categoria::find($codCategoria);
				$produto = new Produto(["nome" => $nomeProduto, "descricao" => "teste", "quantidadeMinima" => 1, "codCategoria" => $codCategoria]);
				$categoria->produtos()->save($produto);
				$produto  = Produto::firstOrFail()->where('nome', $nomeProduto);
				$produto->delete();
			DB::commit();
			
			$this->assertTrue(true);
		}
		catch(Exception $e){
			DB::rollBack();
			
			$this->assertTrue(false, '\nFalha na criação de Produto!');
		}
    }

}
