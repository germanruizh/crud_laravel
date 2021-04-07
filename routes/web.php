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

// Route::get('/', function () {
//     return view('usuarios.listar');
// });

// Listado de usuarios
Route::get('/', 'UsuarioController@list');
// Formulario de usuarios
Route::get('/form', 'UsuarioController@userform');
// Guardar usuarios
Route::post('/save', 'UsuarioController@save')->name('save');
// Eliminar usuarios
Route::delete('/delete/{id}', 'UsuarioController@delete')->name('delete');
// Formulario para editar usuarios
Route::get('/editform/{id}', 'UsuarioController@editform')->name('editform');
// Editar usuarios
Route::patch('/edit/{id}', 'UsuarioController@edit')->name('edit');