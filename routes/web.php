<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});


// redirecionamento de rota
Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');



Route::get('rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');



//Redirecionando da rota 2 para rota 1

//Route::redirect('/rota2','rota1');


// Rota de fallback, não redirecionar quando tenta acessar uma rota que não existe

Route::fallback(function() {
    echo ' A rota não existe. <a href="'.route('site.index').'"> clique aqui</a> para ir para página inicial';
});