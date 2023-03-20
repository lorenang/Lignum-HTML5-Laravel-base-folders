<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

/*RUTAS PARA PELICULAS*/
/* Vista Principal */
Route::get('/admin/peliculas', 'App\Http\Controllers\PeliculaController@index')->name('admin/peliculas');
Route::get('admin/peliculas/show/{id}', 'App\Http\Controllers\PeliculaController@show')->name('admin/peliculas/show'); 

/*RUTAS PARA ACTORES*/
Route::get('/admin/actores', 'App\Http\Controllers\ActorController@index')->name('admin/actores');


Route::put('admin/peliculas/api/store', 'App\Http\Controllers\PeliculaController@guardar');


