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
Route::get('admin/actores/show/{idActor}', 'App\Http\Controllers\ActorController@show')->name('admin/actores/show'); 

#update
Route::get('admin/actores/actualize/{idActor}', 'App\Http\Controllers\ActorController@actualize')->name('admin/actores/actualize');
Route::put('admin/actores/update/{idActor}', 'App\Http\Controllers\ActorController@update')->name('admin/actores/update');

#delete
Route::put('admin/actores/delete/{idActor}', 'App\Http\Controllers\ActorController@delete')->name('admin/actores/delete'); 

PELICULA
Como ADMIN quiero:

Una vez creada la pelicula, ver en un modal sus datos y editarlos, ademas quiero agregar 1 a n actores con solo seleccionarlo y removerlos con un boton (rojo, que tenga una X). 

Hay muchos actores asi que quiero que sea facil de buscar.

Detalles tecnicos:
Realizar con AJAX
El buscador debe ser un select2

Criterios de aceptacion:
Cuando selecciono un actor se suma a la pelicula.
Cuando presiono en la X se elimina ese actor de la pelicula.
Un actor agregado desaparece de la lista de busqueda.
No puedo agregar dos veces el mismo actor (por ejemplo intentando desde dos pestañas diferentes al mismo tiempo).
Si no puse alguno de los datos requeridos para la pelicula no me permite guardar la edicion pero los actores si se guardaron.
[8:41]
///////////////////
///////////////////
///////////////////
ACTORES

Como ADMIN quiero:

Una vez creado un actor, ver en un modal sus datos y editarlos, ademas me resulta mas facil entrar en un actor y agregarle sus peliculas porque soy muy fan.
Quiero agregar 1 a n peliculas a un actor con solo seleccionarla y removerlas con un boton (rojo, que tenga una X). 

Hay muchas peliculas asi que quiero que sea facil de buscar.

Detalles tecnicos:
Realizar con Livewire
El buscador debe ser un select2

Criterios de aceptacion:
Cuando selecciono una pelicula se suma a la pelicula.
Cuando presiono en la X se elimina la pelicula del actor
Una pelicula agregada desaparece de la lista de busqueda.
No puedo agregar dos veces la misma pelicula (por ejemplo intentando desde dos pestañas diferentes al mismo tiempo).
Si no puse alguno de los datos requeridos para el actor no me permite guardar la edicion pero las peliculas si se guardaron. (editado)
[8:43]
///////////////////
///////////////////
///////////////////
ACTIVIDAD DOS

La pantalla de peliculas tarda demasiado en cargar y ya no encuentro ninguna pelicula ni actor!!!

El cliente necesita paginado en sus listados de actores y peliculas y al menos un filtro por nombre.

Detalles tecnicos:
Realizar uno con AJAX Y otro con livewire
Le dariamos mejor experiencia de usuario si el buscador fuera automatico con un debouncer (https://www.freecodecamp.org/espanol/news/curso-debounce-javascript-como-hacer-que-tu-js-espere/) no?

Criterios de aceptacion:
Las listas estan correctamente paginadas y puedo navegarlo en el footer o header (o ambos)
Si busco y me muevo en la paginacion me busca en la lista paginada y no desaparecen los filtros al moverme entre paginas
La busqueda recien comienza luego de tres letras escritas
