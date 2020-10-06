<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;
use App\Http\Requests\ProdutoFormRequest;
use DB;

/**
 * Classe Controller de Produto
 */
class ProdutoController extends Controller
{
 
 	// Construtor da Classe
	public function __construct(){
		return $this->middleware('auth');
	}
    
    // Metodo privado que retorna Lista de Produtos
    private function criarListaProduto(){
		$listaProdutosTemp = Produto::query()->orderBy('nome')->get();

		return $listaProdutosTemp;
	}
    
    // Funcao Pagina Inicial
    public function index(Request $request) {
		$listaProdutos = $this->criarListaProduto();	 
		
		//Obtendo Mensagem, caso exista
		$mensagem = $request->session()->get('mensagem');
		
		return view('produtos.listar', ['listaProdutos' => $listaProdutos, 'mensagem' => $mensagem ]);
	}
	
	// Exibe a pagina para informar os dados do Produto
	public function create(){
		// Carregando lista de Categorias
		$listaCategorias = Categoria::query()->orderBy('nome')->get();
		
		return view('produtos.adicionar', ['listaCategorias' => $listaCategorias]);
	}
	
	// Obtem Produto por $codProduto e abre para exibicao
	public function view($codProduto){
		$produto = Produto::find($codProduto);
		//$quantidadeProdutos = Produto::query()->where('codCategoria', $codCategoria)->count();
		
		return view('produtos.exibir', ['produto'=>$produto]);
	}

	// Obtem Produto por $codProduto e abre para edicao
	public function edit($codProduto){
		$produto = Produto::find($codProduto);
		// Carregando lista de Categorias
		$listaCategorias = Categoria::query()->orderBy('nome')->get();
		
		return view('produtos.editar', ['produto'=>$produto, 'listaCategorias'=>$listaCategorias]);
	}
	
	// Salva o Produto e retorna para a página de ListarProdutos
	public function store(ProdutoFormRequest $request){
		// Persistindo os dados 
		DB::beginTransaction();
			$produto = new Produto($request->all());
			$categoria = Categoria::find($request->codCategoria);
			$categoria->produtos()->save($produto);
		DB::commit();

		// Mensagem de Sucesso
		$request->session()->flash('mensagem', "Produto $request->nome criado com sucesso!");
		
		//return view('categorias.listar');
		return redirect()->route('listarProdutos');
	}
	
	// Obtem Produto por $codProduto e realiza a exclusao
	public function destroy($codProduto){
		$produto = Produto::find($codProduto);
		$produto->delete();
		
		// Mensagem de Sucesso
		$request->session()->flash('mensagem', "Produto $produto->nome removido com sucesso!");
		
		return redirect()->route('listarProdutos');
	}
	
	// Atualiza os dados de Categoria
	public function update(ProdutoFormRequest $request, $codProduto){
		$produto = Produto::find($codProduto);
		$produto->nome = $request->nome;
		$produto->descricao = $request->descricao;
		$produto->quantidadeMinima = $request->quantidadeMinima;
		$produto->codCategoria = $request->codCategoria;
		$produto->save();
		
		// Mensagem de Sucesso
		$request->session()->flash('mensagem', "Produto $produto->nome atualizado com sucesso!");
		
		return redirect()->route('listarProdutos');
	}
}
