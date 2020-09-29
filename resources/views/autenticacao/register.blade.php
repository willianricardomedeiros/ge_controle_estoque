@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Registro de Usu&aacute;rio</h2>
			<br/>
			<form action="/register" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Nome:</label>
					<input class="form-control" type="text" id="name" name="name" required />
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email" required />
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input class="form-control" type="password" id="password" name="password" required />
				</div>
				<center><button type="submit" class="btn btn-primary">Registrar</button></center>
			</form>
		</div>
		<br/>
@endsection
