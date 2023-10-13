<?php

use App\Http\Middleware\LogAcessoMiddleware;
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

//Principal
Route::get('/', 'PrincipalController@principal')->name('site.index');

//Sobre-nós
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

//Contato
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

//Login App
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    //Index App Home
    Route::get('/home', 'HomeController@index')->name('app.home');

    //Logout Sair
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    //Cliente
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    //Fornecedor
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
        Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
        Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //Produto
    Route::resource('produto', 'ProdutoController');
        
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A Rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a página inicial';
});

// nme, categoria, assunto, mensagem

// Route::get(
//     '/contato/{nome}/{categoria_id}', 
//     function(
//         string $nome, 
//         int $categoria_id = 1 // 1 - info

//     ){
//     echo "Estamos aqui: $nome, $categoria_id";
//     }
// )->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
/* verbo http

get
post
put
patch
delete
options

*/