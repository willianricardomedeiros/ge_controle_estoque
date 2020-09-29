@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Produto: {{$produto['nome']}}</h2>
			<br/>
			<div class="form-group">
				<p><b>Nome:</b></p>
				<p>{{$produto['nome']}}</p>
				<p><b>Categoria:</b></p>
				<p>{{$produto->categoria->nome}}</p>
				<p><b>Descri&ccedil;&atilde;o:</b></p>
				<p>{{$produto['descricao']}}</p>
				<div class="row register-form">
					<div class="col-md-6">
						<div class="form-group">
							<p><b>Estoque M&iacute;nimo:</b></p>
							<p>{{$produto['quantidadeMinima']}}</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p><b>Quantidade:</b></p>
							<p>0</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<center>
			<form method="post" action="/produtos/{{$produto['codProduto']}}" onsubmit="return confirm('Tem certeza que deseja remover o Produto?')">
				@csrf
				@method('DELETE')
				<a style="margin-top:8px" href="/produtos/{{$produto['codProduto']}}/edit" class="btn btn-primary mb-2">Editar</a>
				<a style="margin-top:8px" href="/produtos" class="btn btn-secondary mb-2">Voltar</a>
				<button type="submit" class="btn btn-danger">Excluir</button>
            </form>	
		</center>
		<br/>
@endsection
