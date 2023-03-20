<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelicula;
use App\Models\Actor;


class PeliculaController extends Controller
{
    //

    public function index(){         
        return view('admin.peliculas.index');     
    }       

    public function show($idPelicula) {
        $pelicula = Pelicula::find($idPelicula);
        /*$pelicula = DB::table('peliculas')
            ->leftJoin('actor', 'peliculas.ActorPrincipalID', '=', 'actor.idActor')
            ->where('peliculas.id', '=', $id)
            ->get();*/
        return view('admin.peliculas.show', compact('pelicula')); 
    }

    public function guardar(Request $request){
        
        dd($request->all());
        
        
    }

}
