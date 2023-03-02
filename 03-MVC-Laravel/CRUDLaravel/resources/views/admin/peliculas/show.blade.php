<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
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
        <h2>Detalles</h2>
    </div> 
    <div class="panel-body">

        @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif 
        
        <p class="h5">#ID:</p>
        <p class="h6 mb-3">{{ $pelicula->id }}</p>

        <p class="h5">Año:</p>
        <p class="h6 mb-3">{{ $pelicula->year }}</p>

        <p class="h5">Nombre:</p>
        <p class="h6 mb-3">{{ $pelicula->title }}</p>

        <p class="h5">Duracion:</p>
        <p class="h6 mb-3">{{ $pelicula->time }}</p>

        <p class="h5">Sinopsis:</p>
        <p class="h6 mb-3">{{ $pelicula->sinopsis }}</p> 

        <p class="h5">Actor Principal:</p>
        <p class="h6 mb-3">{{ $pelicula->name }}</p> 

        <p class="h5">Imagen:</p>
        <img src="../../../uploads/{{ $pelicula->img }}" class="img-fluid" width="20%">                    

    </div>

    <a href="{{ route('admin/peliculas') }}" class="btn btn-warning mt-3">Volver</a>

</div>
</body>
</html>