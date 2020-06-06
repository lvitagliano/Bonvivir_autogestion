<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Auth::routes();
Route::get('ciudades/porpais/{id}', 'CiudadesController@porpais');
Route::get('generos/portalento/{id}', 'GeneroController@portalento');
Route::get('categorias/porgenero/{id}', 'CategoriaController@porgenero');
Route::get('especialidades/porcategoria/{id}', 'EspecialidadController@porcategoria');
Route::post('proyectos/agregarporbuscador/{id}', 'ProyectosController@agregarporbuscador');

Route::resource('ciudades', 'CiudadesController');
Route::resource('paises', 'PaisesController');
Route::resource('talentos', 'TalentoController');
Route::resource('genero', 'GeneroController');
Route::resource('categoria', 'CategoriaController');
Route::resource('especialidad', 'EspecialidadController');
Route::resource('users', 'UsersController');
Route::resource('proyectos', 'ProyectosController');