@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Login</h2>
			<br/>
			<form method="post" >
				@csrf
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email" required />
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input class="form-control" type="password" id="password" name="password" min="5" required />
				</div>
				<center>
					<button type="submit" class="btn btn-primary">Entrar</button>
					<a style="margin-top:8px" href="/register" class="btn btn-secondary mb-2">Registrar</a>
				</center>
			</form>
		</div>
		<br/>
@endsection
