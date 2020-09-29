@extends('layout')

@section('conteudo')
		<div class="container" style="margin-top:30px">
			<h2>Bem Vindo</h2>
			<br/>
			<center>
			@guest
				Seja bem vindo ao sistema <b>Controle de Produto</b>.<br/><br/>
				Para se autenticar no sistema clique no bot&atilde;o abaixo.<br/><br/>
				<a style="margin-top:8px" href="/login" class="btn btn-primary mb-2">Autenticar</a>
			@endguest
			@auth
				Seja bem vindo <b>{{Session::get('usuario')->name}}</b> ao sistema <b>Controle de Produto</b>.<br/><br/>
				O seu e-mail &eacute; <a href="mailto:{{Session::get('usuario')->email}}">{{Session::get('usuario')->email}}</a>.<br/>
				O seu usu&aacute;rio foi criado em {{Session::get('usuario')->created_at->format('d/m/Y H:i:s')}}.<br/>
			@endauth
			</center>
		</div>
		<br/><br/><br/>
@endsection
