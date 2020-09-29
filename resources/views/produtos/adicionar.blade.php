@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Produto</h2>
			<br/>
			<form action="/produtos" method="post">
				@csrf
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input class="form-control" type="text" id="nome" name="nome" required>
				</div>
				<div class="form-group">
					<label for="codCategoria">Categoria:</label>
					<select class="form-control" id="codCategoria" name="codCategoria" required>
						@foreach($listaCategorias as $categoria)
							<option value="{{$categoria['codCategoria']}}">{{$categoria['nome']}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="descricao">Descri&ccedil;&atilde;o:</label>
					<textarea class="form-control" rows="3" id="descricao" name="descricao" required></textarea>
				</div>
				<div class="row register-form">
					<div class="col-md-6">
						<div class="form-group">
							<label for="quantidadeMinima">Estoque M&iacute;nimo:</label>
							<input class="form-control" type="number" id="quantidadeMinima" name="quantidadeMinima" value="2" max="1000" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="quantidade">Quantidade:</label>
							<p>0</p>
						</div>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-primary">Gravar</button>
					<a style="margin-top:8px" href="/produtos" class="btn btn-secondary mb-2">Voltar</a>
				</center>
			</form>
		</div>
		<br/>
@endsection
