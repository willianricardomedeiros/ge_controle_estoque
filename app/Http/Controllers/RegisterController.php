<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

/**
 * Classe Controller de Registro (Register)
 */
class RegisterController extends Controller
{
   
    /**
     * Acessa a pagina de registro de Login
     */
    protected function create()
    {
        return view('autenticacao.register');
    }
    
    /**
     * Cria novo user 
     *
     * @param  Request  $request
     */
    protected function store(Request $request)
    {
		$data = $request->except('_token');
		$data['password'] = Hash::make($data['password']);
		$user = User::create($data);
		
		Auth::login($user);
		
		return redirect()->route('listarCategorias');
	}
    
}
