<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Produto;
use App\Http\Requests\CategoriaFormRequest;

use DB;

use Throwable;

/**
 * Classe Controller de Categoria
 */
class CategoriaController extends Controller
{

	// Construtor da Classe
	public function __construct(){
		return $this->middleware('auth');
	}

    // Funcao Pagina Inicial
    public function index(Request $request) {
		//$listaCategorias = array(
		//					0 => array("id" => "1", "nome" => "Distintivos de Progressão"),
		//					1 => array("id" => "2", "nome" => "Distintivos de Especialidades"),
		//					2 => array("id" => "3", "nome" => "Distintivos de Modalidade"));
		
		$listaCategorias = Categoria::query()->orderBy('nome')->get();
		
		//Obtendo Mensagem, caso exista
		$mensagem = $request->session()->get('mensagem');
		
		return view('categorias.listar', ['listaCategorias' => $listaCategorias, 'mensagem' => $mensagem]);
	}

	// Atualiza os dados de Categoria
	public function create(){
		return view('categorias.adicionar');
	}

	// Obtem Categoria por $codCategoria e abre para exibicao
	public function view($codCategoria){
		$categoria = Categoria::find($codCategoria);
		$quantidadeProdutos = Produto::query()->where('codCategoria', $codCategoria)->count();
		
		return view('categorias.exibir', ['categoria'=>$categoria, 'quantidadeProdutos'=>$quantidadeProdutos]);
	}

	// Obtem Categoria por $codCategoria e abre para edicao
	public function edit($codCategoria){
		$categoria = Categoria::find($codCategoria);
		$quantidadeProdutos = Produto::query()->where('codCategoria', $codCategoria)->count();
		
		return view('categorias.editar', ['categoria'=>$categoria, 'quantidadeProdutos'=>$quantidadeProdutos]);
	}

	// Atualiza os dados de Categoria
	public function store(CategoriaFormRequest $request){
		// Persistindo os dados 
		DB::beginTransaction();
		Categoria::create($request->all());
		DB::commit();
		
		// Mensagem de Sucesso
		$request->session()->flash('mensagem', "Categoria $request->nome criado com sucesso!");

		return redirect()->route('listarCategorias');
	}

	// Obtem Categoria por $codCategoria e realiza exclusao
	public function destroy(Request $request, $codCategoria){
		try{
			$categoria = Categoria::find($codCategoria);
			$categoria->delete();
		}
		catch (Throwable $qe) {
			return redirect()->back()->withErrors('Nao foi possivel excluir a categoria.');
        }
        // Mensagem de Sucesso
		$request->session()->flash('mensagem', "Categoria $categoria->nome removido com sucesso!");
		
		return redirect()->route('listarCategorias');
	}


	// Atualiza os dados de Categoria
	public function update(CategoriaFormRequest $request, $codCategoria){
		$categoria = Categoria::find($codCategoria);
		$categoria->nome = $request->nome;
		$categoria->save();
		
		// Mensagem de Sucesso
		$request->session()->flash('mensagem', "Categoria $categoria->nome atualizado com sucesso!");
		
		return redirect()->route('listarCategorias');
	}
}
