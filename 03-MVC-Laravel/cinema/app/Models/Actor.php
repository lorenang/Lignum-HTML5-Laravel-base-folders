<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actor';
    
    protected $primaryKey = 'idActor';
    
    // Declaro los campos que usaré de la tabla 'actor' 
    protected $fillable = ['idActor','name', 'birthdate']; 

    public function movie() {
        return $this->hasMany(Pelicula::class);
    }
}
