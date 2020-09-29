@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<div class="row">
				<div class="col-sm-12">
					<h2>Categorias</h2>
					<br/>
					
					<form action="/categorias" method="post">
						@csrf
						<fieldset>
							<legend>Criar Categoria:</legend>
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" required>
							<input type="submit" value="Criar Categoria" class="btn btn-primary">
						</fieldset>
					</form>
					<hr/>
					<p>Listagem das categorias de produtos existentes no banco.</p>
					<table  id="tabelaCategorias" class="display" style="width:100%">
						<thead>
							<tr>
								<th style="width:10%">#</th>
								<th>Nome da Categoria</th>
							</tr>
						</thead> 
						<tbody id="tabelaCategorias"> 
							@foreach($listaCategorias as $categoria)
								<tr>
									<td>{{$categoria['codCategoria']}}</td>
									<td><a href="/categorias/{{$categoria['codCategoria']}}">{{$categoria['nome']}}</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#tabelaCategorias').DataTable({
					language: {
						url: 'Portuguese-Brasil.json'
					}
				} );
			})
		</script>
		<br/>
@endsection
