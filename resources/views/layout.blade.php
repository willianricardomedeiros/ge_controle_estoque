<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>GE Controle de Estoque</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<style>
		  .fakeimg {
			height: 200px;
			background: #aaa;
		  }
		  
		  div.container {
		    width: 80%;
          }
		</style>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0;background:#21610B;height:150px;padding: 1rem 2rem;">
			<img src="/images/Logo.png"  style="top: 0px;float:left;width:110px;height:120px;">
			<h1 style="color:#DDD;">Grupo Escoteiro</h1>
			<p style="color:#AAA;">Controle de Produto</p> 
		</div>

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="/">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav"> 
					@auth
						<li class="nav-item"> <a class="nav-link" href="/categorias">Categorias</a>  </li>
						<li class="nav-item"> <a class="nav-link" href="/produtos">Produtos</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/logout">Sair</a> </li>
					@endauth
					@guest
						<li class="nav-item"> <a class="nav-link" href="/login">Entrar</a> </li>
					@endguest
				</ul>
			</div>  
		</nav>
		@if(!empty($mensagem))
			<div class="alert alert-success">{{$mensagem}}</div>
		@endif
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		@yield('conteudo')

		<div class="jumbotron text-center" styletest1.php="margin-bottom:0">
			<p>IFPR - PHP2020 - Willian Ricardo Medeiros</p>
		</div>

    </body>
</html>
