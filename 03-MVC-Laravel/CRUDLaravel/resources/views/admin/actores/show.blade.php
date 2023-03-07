<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <title>Detalles</title>
</head>
<body>
    <header class="p-3 text-bg-dark">
        <a href="{{ url('/home') }}" class="h1">Cinema</a>
        <a href="{{ route('admin/actores') }}" class="h5">Listado de Actores</a>
        <a href="{{ route('admin/actores/create') }}" class="h5">Añadir Actor</a>
    </header>
<div class="index__peliculas container">
    <div class="panel_title">
        <h2>Detalles</h2>
    </div> 
    <div class="panel-body">

        @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif 
        
        <p class="h5">#ID:</p>
        <p class="h6 mb-3">{{ $actor->idActor }}</p>

        <p class="h5">Nombre:</p>
        <p class="h6 mb-3">{{ $actor->name }}</p>

        <p class="h5">Cumpleaños:</p>
        <p class="h6 mb-3">{{ $actor->birthdate }}</p>                  

    </div>

    <a href="{{ route('admin/actores') }}" class="btn btn-warning mt-3">Volver</a>

</div>
</body>
</html>