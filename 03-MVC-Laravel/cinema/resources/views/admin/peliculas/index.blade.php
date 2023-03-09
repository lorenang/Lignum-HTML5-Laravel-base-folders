@extends('layouts.peliculas') 

@section('content') 

<div class="container">    
    <!--desde esta vista se mostrará el contenido del componente creado de Livewire--> 
   @livewire('pelicula-component') 
</div> 

@endsection