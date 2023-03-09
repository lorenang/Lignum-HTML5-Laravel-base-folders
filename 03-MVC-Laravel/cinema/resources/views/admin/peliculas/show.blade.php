<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @livewireStyles
</head>

<body>
    <header class="p-3 text-bg-dark">
        <a href="{{ url('/home') }}" class="h1">Cinema</a>
        <a href="{{ route('admin/peliculas') }}" class="h5">Pelicula</a>
    </header>
    <div class="index__peliculas container">
        <div class="panel_title">
            <h2>Detalles</h2>
        </div>
        <div class="panel-body">

            <p class="h5">#ID:</p>
            <p class="h6 mb-3">{{ $pelicula->idPelicula }}</p>

            <p class="h5">Año:</p>
            <p class="h6 mb-3">{{ $pelicula->year }}</p>

            <p class="h5">Nombre:</p>
            <p class="h6 mb-3">{{ $pelicula->title }}</p>

            <p class="h5">Duracion:</p>
            <p class="h6 mb-3">{{ $pelicula->time }}</p>

            <p class="h5">Sinopsis:</p>
            <p class="h6 mb-3">{{ $pelicula->sinopsis }}</p>

            <p class="h5">Actor Principal:</p>
            <p class="h6 mb-3">{{$pelicula->actor->name}}</p>

            <p class="h5">Actor Secundario:</p>
            <p class="h6 mb-3">{{$pelicula->actorSec->name}}</p>

            <div class="div_img">
                @if($pelicula->img)
                <p class="h5">Imagen:</p>
                <img src="../../../../uploads/{{ $pelicula->img }}" class="img-fluid" width="20%">
                
                <label for="img" class="negrita">Desea cambiar la imagen?:</label>
                <form wire:submit.prevent="save">
                    <input type="file" wire:model="img" id="img" name="img">
                    @error('img') <span class="error">{{ $message }}</span> @enderror
                </form>
                <button type="submit" class="btn btn-outline-warning"
                wire:click="updatePeli">Guardar</button>

                @else
                <label for="img" class="negrita">Selecciona una imagen:</label>
                <form wire:submit.prevent="save">
                    <input type="file" wire:model="img">
                    @error('img') <span class="error">{{ $message }}</span> @enderror
                </form>
                <button type="submit" class="btn btn-outline-warning"
                wire:click="updatePeli">Guardar</button>
                @endif
            </div>
        </div>

        <a href="{{ route('admin/peliculas') }}" class="btn btn-warning mt-3">Volver</a>
    </div>
    <br>
    @livewireScripts
</body>

</html>