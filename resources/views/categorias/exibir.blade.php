@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Categoria: {{$categoria['nome']}}</h2>
			<br/>
			<div class="form-group">
				<p><b>Nome:</b></p>
				<p>{{$categoria['nome']}}</p>
				<p><b>Quandidade de Produtos:</b></p>
				<p>{{$quantidadeProdutos}}</p>
			</div>
		</div>
		<center>
			<form method="post" action="/categorias/{{$categoria['codCategoria']}}" onsubmit="return confirm('Tem certeza que deseja remover  a categoria?')">
				@csrf
				@method('DELETE')
				<a style="margin-top:8px" href="/categorias/{{$categoria['codCategoria']}}/edit" class="btn btn-primary mb-2">Editar</a>
				<a style="margin-top:8px" href="/categorias" class="btn btn-secondary mb-2">Voltar</a>
				@if($quantidadeProdutos == 0)
					<button type="submit" class="btn btn-danger">Excluir</button>
				@else
					<a style="margin-top:8px" href="JavaScript:alert('Categoria não pode se excluído pois possui produto sendo associado!')" class="btn btn-danger mb-2">Excluir</a>
				@endif
            </form>	
		</center>
		<br/>
@endsection
