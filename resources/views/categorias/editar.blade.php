@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Categoria</h2>
			<br/>
			<form method="post" action="/categorias/{{$categoria['codCategoria']}}" >
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input class="form-control" type="text" id="nome" name="nome" value="{{$categoria['nome']}}" required>
					<p><b>Quandidade de Produtos:</b></p>
					<p>{{$quantidadeProdutos}}</p>
				</div>
				<center>
					<button type="submit" class="btn btn-primary">Gravar</button>
					<a style="margin-top:8px" href="/categorias" class="btn btn-secondary mb-2">Voltar</a>
				</center>
			</form>
		</div>
		<br/>
@endsection
