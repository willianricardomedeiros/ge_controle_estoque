<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

// Categoria
Route::get('/categorias', 'CategoriaController@index')->name('listarCategorias');
Route::get('/categorias/create', 'CategoriaController@create')->name('criarCategoria');
Route::post('/categorias', 'CategoriaController@store')->name('salvarCategoria');
Route::put('/categorias/{codCategoria}', 'CategoriaController@update')->name('alterarCategoria');
Route::get('/categorias/{codCategoria}', 'CategoriaController@view')->name('exibirCategoria');
Route::get('/categorias/{codCategoria}/edit', 'CategoriaController@edit')->name('editarCategoria');
Route::delete('/categorias/{codCategoria}', 'CategoriaController@destroy')->name('excluirCategoria');

// Produto
Route::get('/produtos', 'ProdutoController@index')->name('listarProdutos');
Route::get('/produtos/create', 'ProdutoController@create')->name('criarProduto');
Route::post('/produtos', 'ProdutoController@store')->name('salvarProduto');
Route::put('/produtos/{codProduto}', 'ProdutoController@update')->name('alterarProduto');
Route::get('/produtos/{codProduto}', 'ProdutoController@view')->name('exibirProduto');
Route::get('/produtos/{codProduto}/edit', 'ProdutoController@edit')->name('editarProduto');
Route::delete('/produtos/{codProduto}', 'ProdutoController@destroy')->name('excluirProduto');

// Autenticacao
Auth::routes();

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

//Route::get('/home', 'HomeController@index')->name('home');
