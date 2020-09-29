@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<div class="row">
				<div class="col-sm-12">
					<h2>Produtos</h2>
					<br/>
					<a href="/produtos/create" class="btn btn-primary mb-2">Criar Produto</a>
					<hr/>
					<p>Listagem dos produtos existentes no banco.</p>
					<table  id="tabelaProdutos" class="display" style="width:100%">
						<thead>
							<tr>
								<th style="width:10%">#</th>
								<th>Nome</th>
								<th>Categoria</th>
							</tr>
						</thead> 
						<tbody id="tabelaProdutos"> 
							@foreach($listaProdutos as $produto)
								<tr>
									<td>{{$produto['codProduto']}}</td>
									<td><a href="/produtos/{{$produto['codProduto']}}">{{$produto['nome']}}</a></td>
									<td>{{$produto->categoria->nome}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#tabelaProdutos').DataTable({
					language: {
						url: 'Portuguese-Brasil.json'
					}
				} );
			})
		</script>
		<br/>
@endsection
