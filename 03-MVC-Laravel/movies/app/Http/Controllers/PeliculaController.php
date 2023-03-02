<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Actor;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;

use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\RedirectResponse;

use DB;
use Input;
use Storage;
use DateTime;
use Redirect;
use Session;


class PeliculaController extends Controller {

    public function index(){
        #https://laravel.com/docs/10.x/queries#joins
        #$pelicula = Pelicula::all();
        //en $pelicula realizo un llamado a todos los registros de la tabla peliculas, luego los envío a la vista index.blade.php que se encuentra en resources > view > admin > peliculas > index.blade.php
        /*SELECT * FROM peliculas P LEFT JOIN actor A on P.ActorPrincipalID = A.idActor;*/
        $pelicula = DB::table('peliculas')
            ->leftJoin('actor', 'peliculas.ActorPrincipalID', '=', 'actor.idActor')
            ->get();
        return view('admin.peliculas.index', compact('pelicula')); 
    }

    //creo un registro
    public function create() {
        $pelicula = Pelicula::all();
        $actor = Actor::all();
        return view ('admin.peliculas.create', compact('pelicula'), compact('actor'));
    }

    public function store(ItemCreateRequest $request)  {
        // Instancio al modelo Pelicula que hace llamado a la tabla 'pelicula' de la Base de Datos
        $pelicula = new Pelicula; 
        // Recibo todos los datos del formulario de la vista 'create.blade.php'
        $pelicula->year = $request->year;
        $pelicula->title = $request->title;
        $pelicula->time = $request->time;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->ActorPrincipalID = $request->input('ActorPrincipalID');
        
        // Almaceno la imagen en la carpeta publica especifica
        $pelicula->img = $request->file('img')->store('/'); 


        // Guardo la fecha de creación del registro 
        $pelicula->created_at = (new DateTime)->getTimestamp(); 
    
        // Inserto todos los datos en mi tabla 'pelicula' 
        $pelicula->save();
    
        // Hago una redirección a la vista principal con un mensaje 
        return redirect('admin/peliculas')->with('message','Guardado Satisfactoriamente !'); 
    }

    //$id será el id del registro asignado en la tabla pelicula, cada registro cuenta con un id único y nuestro método actualizar() debe saber que registro se va actualizar.
    public function show($id) {
        $pelicula = Pelicula::find($id);
        /*$pelicula = DB::table('peliculas')
            ->leftJoin('actor', 'peliculas.ActorPrincipalID', '=', 'actor.idActor')
            ->where('peliculas.id', '=', $id)
            ->get();*/
        return view('admin.peliculas.show', compact('pelicula')); 
    }

    public function actualize($id) {
        $pelicula = Pelicula::find($id);
        $actor = Actor::all();
        return view('admin.peliculas.actualize',compact('pelicula'), compact('actor'));
    }
    
    // Proceso de Actualización de un Registro (Update)
    public function update(ItemCreateRequest $request, $id) {        
        // Recibo todos los datos desde el formulario Actualizar
        
        $pelicula = Pelicula::find($id);

        $pelicula->year = $request->year;
        $pelicula->title = $request->title;
        $pelicula->time = $request->time;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->ActorPrincipalID = $request->input('ActorPrincipalID');
    
        // Recibo la imagen desde el formulario Actualizar
        if ($request->hasFile('img')) {
            $pelicula->img = $request->file('img')->store('/');
        }
    
        // Guardamos la fecha de actualización del registro 
        $pelicula->updated_at = (new DateTime)->getTimestamp(); 
            
        // Actualizo los datos en la tabla 'pelicula'
        $pelicula->save();
    
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/peliculas');
    }

    public function delete($id){
        // Indicamos el 'id' del registro que se va Eliminar
        $pelicula = Pelicula::find($id);
    
        // Elimino la imagen de la carpeta 'uploads'
        $imagen = explode(",", $pelicula->img);
        Storage::delete($imagen);
            
        // Elimino el registro de la tabla 'pelicula' 
        Pelicula::destroy($id); 
    
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes mantenerlo en 
        // una tabla llamada por ejemplo 'peliculas_eliminadas' y alli guardas su fecha de eliminación 
        // $pelicula->deleted_at = (new DateTime)->getTimestamp();
            
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/peliculas');
    }

}
