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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('obtenerUsuarios',function(){
    $usuarios = [
        "pepe",
        "mimi",
        "maicol"
    ];
    return $usuarios;
});

Route::put('registrarLocal', 'LocalController@store')->middleware('auth');

//actualizar datos del local

Route::post('actualizarDatos', 'LocalController@update');
Route::post('/actualizarImagenLocal', 'LocalController@updateImg');
//Productos
Route::post('/guardarProducto', 'ProductController@store')->middleware('auth');
Route::get('/obtenerGaleria/{id}', 'ProductController@show')->middleware('auth');
Route::post('/eliminarProducto', 'ProductController@destroy')->middleware('auth');
Route::post('/actualizarProducto', 'ProductController@update')->middleware('auth');

//buscar

Route::get('buscar','ProductController@buscar');
Route::get('infoLocal/{id}', 'LocalController@show');
Route::get("local/{id}", "LocalController@index");
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
