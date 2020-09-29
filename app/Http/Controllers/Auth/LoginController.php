<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
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
		return redirect()->route('listarCategorias');
	}
    
    // Realiza o logout do sistema
    public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}
    
}
