<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
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
            <h2>Añadir Pelicula</h2>
        </div> 

        <div class="panel-body">               
            <section class="example mt-4">
                <form method="POST" action="{{ route('admin/peliculas/store') }}" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @include('admin.peliculas.form.prt')
                                                 
                </form>                                                        
            </section>
        </div>
    </div>

</body>
</html>