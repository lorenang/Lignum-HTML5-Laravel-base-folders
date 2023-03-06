<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<header class="p-3 text-bg-dark">
    <a href="{{ url('/home') }}" class="h1">Cinema</a>
    <a href="{{ route('admin/peliculas') }}" class="h5">Listado de Peliculas</a>
    <a href="{{ route('admin/peliculas/create') }}" class="h5">Añadir Pelicula</a>
</header>
<div class="index__peliculas container">
    <div class="panel_title">
        <h2>Peliculas</h2>
        <a href="{{ route('admin/peliculas/create') }}" class="btn btn-success mt-4 ml-3">Nueva</a>
    </div> 
    <div class="panel-body">
        @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
            
                        
        <section class="example mt-4">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Año</th>
                            <th>Titulo</th>
                            <th>Duracion</th>
                            <th>Sinopsis</th>
                            <th>Portada</th>
                            <th>Actor Principal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelicula as $peli)
                            <tr>
                                <td class="v-align-middle">{{$peli->id}}</td>
                                <td class="v-align-middle">{{$peli->year}}</td>
                                <td class="v-align-middle">{{$peli->title}}</td>
                                <td class="v-align-middle">{{$peli->time}}</td>
                                <td class="v-align-middle">{{$peli->sinopsis}}</td>
                                <td class="v-align-middle">
                                    <img src="{!! asset("uploads/$peli->img") !!}" width="50" class="img-responsive">
                                </td>
                                <td class="v-align-middle">{{$peli->actor->name}}</td>
                                <td class="v-align-middle">{{$peli->actorSec->name}}</td>
                                <td class="v-align-middle">
                                    <form action="{{ route('admin/peliculas/delete',$peli->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                                        <a href="{{ route('admin/peliculas/show',$peli->id) }}" class="btn btn-dark">Detalles</a>                                         
                                        <a href="{{ route('admin/peliculas/actualize',$peli->id) }}" class="btn btn-primary">Editar</a>       
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>                               
                                </td>                                                 
                            </tr>                                          
                        @endforeach
                    </tbody>
                </table>

            </div>
        </section>
    </div>
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>