<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<header class="p-3 text-bg-dark">
    <a href="{{ url('/home') }}" class="h1">Cinema</a>
    <a href="{{ route('admin/actores') }}" class="h5">Listado de Actores</a>
    <a href="{{ route('admin/actores/create') }}" class="h5">Añadir Actor</a>
</header>
<div class="index__peliculas container">
    <div class="panel_title">
        <h2>Actores</h2>
        <a href="{{ route('admin/actores/create') }}" class="btn btn-success mt-4 ml-3">Nuevo</a>
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
                            <th>Nombre</th>
                            <th>Cumpleaños</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actor as $ac)
                            <tr>
                                <td class="v-align-middle text-center">{{$ac->idActor}}</td>
                                <td class="v-align-middle text-center">{{$ac->name}}</td>
                                <td class="v-align-middle text-center">{{$ac->birthdate}}</td>
                                <td class="v-align-middle text-center">
                                    <form action="{{ route('admin/actores/delete',$ac->idActor) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                                        <a href="{{ route('admin/actores/show',$ac->idActor) }}" class="btn btn-dark">Detalles</a>            
                                        <a href="{{ route('admin/actores/actualize',$ac->idActor) }}" class="btn btn-primary">Editar</a>       
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