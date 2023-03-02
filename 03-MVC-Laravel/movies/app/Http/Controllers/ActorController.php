<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use App\Models\Actor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use DateTime; 
use Input;
use Redirect;
use Session;
use Storage;

class ActorController extends Controller {

    public function index(){
        $actor = Actor::all();
        //en $actor realizo un llamado a todos los registros de la tabla actor, luego los envío a la vista index.blade.php que se encuentra en resources > view > admin > actor > index.blade.php
        return view('admin.actores.index', compact('actor')); 
    }

    //creo un registro
    public function create() {
        $actor = actor::all();
        return view ('admin.actores.create', compact('actor'));
    }

    #ItemCreateRequest validará los datos antes de ser enviados al servidor
    public function store(ItemCreateRequest $request) {
        // Instancio al modelo actor que hace llamado a la tabla 'actor' de la Base de Datos
        $actor = new Actor; 
        // Recibo todos los datos del formulario de la vista 'crear.blade.php'
        $actor->name = $request->name;
        $actor->birthdate = $request->birthdate;
        
        // Guardo la fecha de creación del registro 
        $actor->created_at = (new DateTime)->getTimestamp(); 
    
        // Inserto todos los datos en mi tabla 'actor' 
        $actor->save();
    
        // Hago una redirección a la vista principal con un mensaje 
        return redirect('admin/actores')->with('message','Guardado Satisfactoriamente !'); 
    }
    //$id será el id del registro asignado en la tabla actor, cada registro cuenta con un id único y nuestro método actualizar() debe saber que registro se va actualizar.
    public function show($idActor) {
        $actor = Actor::find($idActor);
        return view('admin.actores.show', compact('actor')); 
    }

    public function actualize($idActor) {
        $actor = Actor::find($idActor);
        return view('admin.actores.actualize',compact('actor'));
    }
    
    // Proceso de Actualización de un Registro (Update)
    public function update(ItemUpdateRequest $request, $idActor) {        
        // Recibo todos los datos desde el formulario Actualizar
        $actor = actor::find($idActor);

        $actor->name = $request->name;
        $actor->birthdate = $request->birthdate;
    
        // Guardamos la fecha de actualización del registro 
        $actor->updated_at = (new DateTime)->getTimestamp(); 
            
        // Actualizo los datos en la tabla 'actor'
        $actor->save();
    
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/actores');
    }

    public function delete($idActor){
        // Indicamos el 'id' del registro que se va Eliminar
        $actor = Actor::find($idActor);
    
        // Elimino el registro de la tabla 'actor' 
        Actor::destroy($idActor); 
    
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes mantenerlo en 
        // una tabla llamada por ejemplo 'actores_eliminadas' y alli guardas su fecha de eliminación 
        // $actor->deleted_at = (new DateTime)->getTimestamp();
            
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/actores');
    }

}
