<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Actor;


class ActorComponent extends Component
{
    use WithPagination;
    public $idActor, $name, $birthdate;
    public $view = 'create';

    public function render()
    {
        $actor = Actor::orderBy('idActor', 'asc')->paginate(10);
        return view('livewire.actor-component', compact('actor'));
    }

    public function save(){
        $this->validate([
            'name' => 'required',
            'birthdate' => 'required'
        ]);
 
        Actor::create([
            'name'=> $this->name,
            'birthdate' => $this->birthdate
        ]);
        $this->reset();
    }

    public function edit($idActor){
        $actor = Actor::find($idActor);
        $this->idActor = $actor->idActor;
        $this->name = $actor->name;
        $this->birthdate = $actor->birthdate;
        $this->view = 'edit';
    }
    
    //al final de este método cambio el valor de la variable $view por el valor ‘edit’ para que las vistas create y edit ssean dinámicas.

    //creo el método update() que es el que se encargará de realizar las actualizaciones a la base de datos:
    public function update(){
        $this->validate([
            'name' => 'required',
            'birthdate' => 'required'
        ]);
        $actor = Actor::find($this->idActor);
        $actor->update([
            'name'        => $this->name,
            'birthdate' => $this->birthdate
        ]);
        $this->reset();
    }
    public function destroy($idActor){         
        Actor::destroy($idActor);     
    }
}
