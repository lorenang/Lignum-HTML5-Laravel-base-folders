<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Pelicula;
use App\Models\Actor;


class PeliculaComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $idPelicula, $year, $title, $time, $sinopsis, $img, $ActorPrincipalID, $ActorSecundarioID;

    public $view = 'create';
    

    public function render()
    {
        $peliculas = Pelicula::orderBy('idPelicula', 'asc')->paginate(10);
        $actor = Actor::all();
        return view('livewire.pelicula-component', compact('peliculas'), compact('actor'));
    }

    public function save(){
        $this->validate([
            'year' => 'required',
            'title' => 'required|min:6',
            'time' => 'required',
            'sinopsis' => 'required|min:10'
        ]);
 
        Pelicula::create([
            'year'=> $this->year,
            'title'=> $this->title,
            'time'=> $this->time,
            'sinopsis'=> $this->sinopsis,
            'img'=>$this->img->store('/'),
            'ActorPrincipalID'=> $this->ActorPrincipalID,
            'ActorSecundarioID'=> $this->ActorSecundarioID,

        ]);
        $this->reset();
    }

    public function edit($idPelicula){
        $actor = Actor::all();
        $pelicula = Pelicula::find($idPelicula);
        $this->idPelicula = $pelicula->idPelicula;
        $this->year = $pelicula->year;
        $this->title = $pelicula->title;
        $this->time = $pelicula->time;
        $this->sinopsis = $pelicula->sinopsis;
        $this->img = $pelicula->img;
        $this->ActorPrincipalID = $pelicula->ActorPrincipalID;
        $this->ActorSecundarioID = $pelicula->ActorSecundarioID;
        $this->view = 'edit';
    }

    public function update(){
        //Livewire proporciona una $rulespropiedad para establecer reglas de validación por componente
        //$this->validate():método para validar las propiedades de un componente usando las reglas de $rulespropiedad.
        //en este caso deseo validar usando reglas distintas a las definidas en la $rulespropiedad y lo hago pasando las reglas directamente a los métodos validate()
        $this->validate([
            'year' => 'required',
            'title' => 'required|min:6',
            'time' => 'required',
            'sinopsis' => 'required|min:10'
        ]);
        $pelicula = Pelicula::find($this->idPelicula);
        $pelicula->update([
            'year'=> $this->year,
            'title'=> $this->title,
            'time'=> $this->time,
            'sinopsis'=> $this->sinopsis,
            'img'=>$this->img->store('/'),
            'ActorPrincipalID'=> $this->ActorPrincipalID,
            'ActorSecundarioID'=> $this->ActorSecundarioID
        ]);
        //$this->reset() para restablecer mediante programación los valores de propiedad pública a su estado inicial. Esto es útil para limpiar los campos de entrada después de realizar una acción.
        $this->reset();
    }

    public function destroy($idPelicula){         
        Pelicula::destroy($idPelicula);     
        $pelicula = Pelicula::find($idPelicula);
        // Elimino la imagen de la carpeta 'uploads'
        //$img = explode(",", $pelicula->img);
        //uploads::delete($img);
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes mantenerlo en 
        // una tabla llamada por ejemplo 'peliculas_eliminadas' y alli guardas su fecha de eliminación 
        // $pelicula->deleted_at = (new DateTime)->getTimestamp(); 
        // Muestro un mensaje y redirecciono a la vista principal 
    }

    

}
