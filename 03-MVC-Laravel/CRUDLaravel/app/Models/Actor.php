<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    // Instancio la tabla 'actor' 
    protected $table = 'actor';
    
    // Declaro los campos que usaré de la tabla 'actor' 
    protected $fillable = ['idActor','name', 'birthdate']; 

    public function movie() {
        return $this->hasMany(Pelicula::class);
    }
    //el actor ahora tiene un método llamado movie(), que dice que un actor puede asociarse con varias peliculas
}
