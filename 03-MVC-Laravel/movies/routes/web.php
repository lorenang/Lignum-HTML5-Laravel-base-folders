<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

/*RUTAS PARA PELICULAS*/
/* Vista Principal */
Route::get('/admin/peliculas', 'App\Http\Controllers\PeliculaController@index')->name('admin/peliculas');

#Create
Route::get('admin/peliculas/create', 'App\Http\Controllers\PeliculaController@create')->name('admin/peliculas/create');
Route::put('admin/peliculas/store', 'App\Http\Controllers\PeliculaController@store')->name('admin/peliculas/store');

#Read
Route::get('admin/peliculas/show/{id}', 'App\Http\Controllers\PeliculaController@show')->name('admin/peliculas/show'); 

#update
Route::get('admin/peliculas/actualize/{id}', 'App\Http\Controllers\PeliculaController@actualize')->name('admin/peliculas/actualize');
Route::put('admin/peliculas/update/{id}', 'App\Http\Controllers\PeliculaController@update')->name('admin/peliculas/update');

#delete
Route::put('admin/peliculas/delete/{id}', 'App\Http\Controllers\PeliculaController@delete')->name('admin/peliculas/delete'); 


/*VISTA PARA ACTORES*/
/* Vista Principal */
Route::get('/admin/actores', 'App\Http\Controllers\ActorController@index')->name('admin/actores');

#Create
Route::get('admin/actores/create', 'App\Http\Controllers\ActorController@create')->name('admin/actores/create');
Route::put('admin/actores/store', 'App\Http\Controllers\ActorController@store')->name('admin/actores/store');

#Read
Route::get('admin/actores/show/{id}', 'App\Http\Controllers\ActorController@show')->name('admin/actores/show'); 

#update
Route::get('admin/actores/actualize/{id}', 'App\Http\Controllers\ActorController@actualize')->name('admin/actores/actualize');
Route::put('admin/actores/update/{id}', 'App\Http\Controllers\ActorController@update')->name('admin/actores/update');

#delete
Route::put('admin/actores/delete/{id}', 'App\Http\Controllers\ActorController@delete')->name('admin/actores/delete'); 