<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

     // Instancio la tabla 'peliculas' 
    protected $table = 'peliculas';

    protected $primaryKey = 'idPelicula';
    
     // Declaro los campos que usaré de la tabla 'peliculas' 
    protected $fillable = ['idPelicula','year', 'title', 'time', 'sinopsis', 'img', 'ActorPrincipalID', 'ActorSecundarioID']; 

     // Pelicula y actor principal: muchos a uno (muchas peliculas un actor principal)
 
    public function actor() {
        return $this->belongsTo(
            Actor::class, 'ActorPrincipalID', 'idActor');

        #return $this->belongsTo(Actor::class);
        //va en el model que tiene la foranea
         //función llamada actor() me sirve para acceder al actor de esta pelicula. Si no hubiera una base de datos ni claves externas, una declaración como $this->belongsTo no tendría sentido. Es solo porque hay una clave externa en la tabla pelicula que Laravel puede usar ese id para buscar al actor con el mismo id y devuélvelo. Por sí solo, sin la cooperación de la base de datos, Laravel no puede crear relaciones de la nada.
    }
    public function actorSec() {
        return $this->belongsTo(
            Actor::class, 'ActorSecundarioID', 'idActor');

        #return $this->belongsTo(Actor::class);
         //función llamada actor() me sirve para acceder al actor de esta pelicula. Si no hubiera una base de datos ni claves externas, una declaración como $this->belongsTo no tendría sentido. Es solo porque hay una clave externa en la tabla pelicula que Laravel puede usar ese id para buscar al actor con el mismo id y devuélvelo. Por sí solo, sin la cooperación de la base de datos, Laravel no puede crear relaciones de la nada.
    }
}
