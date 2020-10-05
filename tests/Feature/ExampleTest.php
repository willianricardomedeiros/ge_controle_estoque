<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Str;

use App\Categoria;

use Exception;

use DB;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAplicacaoRodando()
    {
        $response = $this->get('http://localhost:8000');
        $response->assertStatus(200);
    }

    public function testCategoriaComNomeNulo()
    {
		//$this->expectException(Exception::class);
		
		// SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: categoria.nome
		$this->expectExceptionCode(23000);
		 
		Categoria::create(["nome" => null]);
    }

	public function testCategoriaCriacaoRandomica()
    {
		try{
			$nome = Str::random(60);
			
			DB::beginTransaction();
			
			Categoria::create(["nome" => $nome]);
			$categoria = Categoria::firstOrFail()->where('nome', $nome);
			$categoria->delete();
			
			DB::commit();
			
			$this->assertTrue(true);
		}
		catch(Exception $e){
			DB::rollBack();
			
			$this->assertTrue(false, 'Falha na criação de categoria!');
		}
    }
}
