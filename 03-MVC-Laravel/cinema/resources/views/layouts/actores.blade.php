<!DOCTYPE html>
<!--ESTA ES LA PANTALLA PRINCIPAL DE ACTORES-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actores</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <header class="p-3 text-bg-dark">
        <a href="{{ url('/home') }}" class="h1">Cinema</a>
        <a href="{{ route('admin/peliculas') }}" class="h5">Peliculas</a>
        <a href="{{ route('admin/actores') }}" class="h5">Actores</a>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
    @livewireScripts
</body>
</html>