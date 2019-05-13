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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Empresa/', [
    'uses' =>'Controller@Miempresa',
    'as' => 'Controller.empresa'
]);

Route::get('empresausuarios/', [
    'uses' =>'Controller@empresausuarios',
    'as' => 'Controller.empresausuarios'
]);

Route::get('Competidores/', [
    'uses' =>'Controller@Competidores',
    'as' => 'Controller.competidores'
]);
Route::get('CompetidoresCriterios/{id?}', [
    'uses' =>'Controller@CompetidoresCriterios',
    'as' => 'Controller.competidoresCriterios'
]);

Route::get('Nuevo Criterio/', [
    'uses' =>'Controller@NuevoCriterio',
    'as' => 'Controller.nuevocriterio'
]);
Route::get('usuarios/', [
    'uses' =>'Controller@usuarios',
    'as' => 'Controller.usuarios'
]);
Route::post('StoreCriterio/', [
    'uses' =>'Controller@storeCriterio',
    'as' => 'Controller.criteriostore'
]);
Route::post('criteriostore/', [
    'uses' =>'Controller@criteriostore',
    'as' => 'Controller.criteriostore2'
]);
Route::get('StoreCriterioCompetidor/{id?}/{idc?}', [
    'uses' =>'Controller@CriterioCompetidor',
    'as' => 'Controller.CriterioCompetidor'
]);
Route::get('Matriz/', [
    'uses' =>'Controller@Matriz',
    'as' => 'Controller.matriz'
]);

Route::get('EliminarCompetidor/{id?}', [
    'uses' =>'Controller@EliminarCompetidor',
    'as' => 'Controller.EliminarCompetidor'
]);
Route::get('EliminarCriterio/{id?}', [
    'uses' =>'Controller@EliminarCriterio',
    'as' => 'Controller.EliminarCriterio'
]);
Route::get('EliminarUsuario/{id?}', [
    'uses' =>'Controller@EliminarUsuario',
    'as' => 'Controller.EliminarUsuario'
]);
Route::get('EditarEmpresa/{id?}', [
    'uses' =>'Controller@EditarEmpresa',
    'as' => 'Controller.EditarEmpresa'
]);
Route::post('EditarEmpresas/', [
    'uses' =>'Controller@EditarEmpresas',
    'as' => 'Controller.EditarEmpresas'
]);


Route::post('StoreCompetidores/', [
    'uses' =>'Controller@CompetidoresStore',
    'as' => 'Controller.CompetidoresStore'
]);