<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class LoginController extends Controller
{
   
    // Abre a tela de Login para o usuario
    public function index(Request $request) {
		return view('autenticacao.login');
	}
    
    // Realiza o login do sistema
    public function login(Request $request){
		$credentials = $request->only(['email','password']);
		if(!Auth::attempt($credentials)){
			return redirect()->back()->withErrors('Usuário e/ou senha incorretos');
		}
		$usuario = $request->user();
		$request->session()->put('usuario', $usuario);
		
		return redirect()->route('listarCategorias');
	}
    
    // Realiza o logout do sistema
    public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}
    
}
