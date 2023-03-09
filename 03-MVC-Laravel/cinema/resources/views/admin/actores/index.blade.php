<!--desde esta vista se mostrará el contenido del componente creado de Livewire-->
@extends('layouts.actores') 

@section('content') 

<div class="container">     
   @livewire('actor-component') 
</div> 

@endsection