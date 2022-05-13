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


Auth::routes(['register' => false]);

//ROTAS HOME
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//ROTAS DE CADASTRO

//EMPRESA
Route::get('/cadastro/cadastro_empresa','EmpresasController@ViewCadastroEmpresa')->name('CadastroEmpresa');
Route::get('/cadastro/edita_empresa{cd_emp}','EmpresasController@ViewEditaEmpresa')->name('EditaEmpresa');
//FUNCIONARIO
Route::get('/cadastro/edita_funcionario{cd_funcionario}','FuncionariosController@ViewEditaFuncionario')->name('EditaFuncionario');
Route::get('/cadastro/cadastro_funcionario','FuncionariosController@ViewCadastroFuncionario')->name('CadastroFuncionario');


//EMPRESAS
Route::post('/cadastro/cadastro_empresa','EmpresasController@CreateEmpresas')->name('CadastroEmpresa');
Route::get('/empresa','EmpresasController@ReadEmpresas')->name('ListaEmpresa');
Route::put('/cadastro/edita_empresa{cd_emp}','EmpresasController@UpdateEmpresas')->name('AlteraEmpresa');
Route::delete('/empresa/{cd_emp}','EmpresasController@DeleteEmpresas')->name('DeletaEmpresa');

//FUNCIONARIOS
Route::post('/cadastro/cadastro_funcionario','FuncionariosController@CreateFuncionarios')->name('CadastroFuncionario');
Route::get('/funcionario','FuncionariosController@ReadFuncionarios')->name('ListaFuncionario');
Route::put('/cadastro/edita_funcionario{cd_funcionario}','FuncionariosController@UpdateFuncionarios')->name('AlteraFuncionario');
Route::delete('/funcionario/{cd_funcionario}','FuncionariosController@DeleteFuncionarios')->name('DeletaFuncionario');

//ROTA DE REDIRECIONAMENTO
Route::fallback( function (){
    echo 'Essa Página não existe <a href='.route('home').'>clique aqui </a> para retornar para a página inicial';}
);
