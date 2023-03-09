<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS-->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

</head>
<body>
    <header class="p-3 text-bg-dark">
        <a href="{{ url('/home') }}" class="h1">Cinema</a>
    </header>
    
    <main>
        <section class="carousel">
            <div class="slide">
                <div class="slide-inner">
                    <input class="slide-open" type="radio" id="slide-1-1" name="slide1" aria-hidden="true" hidden="" checked="checked">

                    <div class="slide-item">
                        <img src="{{ asset('images/descarga1.jpg')}}">
                    </div>
                    <input class="slide-open" type="radio" id="slide-2-1" name="slide1" aria-hidden="true" hidden="">
                
                    <div class="slide-item">
                        <img src="{{ asset('images/descarga1.jpg')}}">
                    </div>
                    <input class="slide-open" type="radio" id="slide-3-1" name="slide1" aria-hidden="true" hidden="">
                    
                    <div class="slide-item">
                        <img src="{{ asset('images/descarga1.jpg')}}">
                    </div>
                
                    <label for="slide-3-1" class="slide-control prev control-1-1">‹</label>
                    <label for="slide-2-1" class="slide-control next control-1-1">›</label>
                    <label for="slide-1-1" class="slide-control prev control-2-1">‹</label>
                    <label for="slide-3-1" class="slide-control next control-2-1">›</label>
                    <label for="slide-2-1" class="slide-control prev control-3-1">‹</label>
                    <label for="slide-1-1" class="slide-control next control-3-1">›</label>
            
                    <ol class="slide-indicador">
                        <li>
                            <label for="slide-1-1" class="slide-circulo">•</label>
                        </li>
                        <li>
                            <label for="slide-2-1" class="slide-circulo">•</label>
                        </li>
                        <li>
                            <label for="slide-3-1" class="slide-circulo">•</label>
                        </li>
                    </ol>
                </div>
            </div>    
        </section>

        <section class="enlaces"> 
            <div class="container_peliculas">
                <div class="container_title">
                    <h2>Peliculas</h2>
                </div>
                <p>En esta seccion podes ver un listado de peliculas, añadir y editar</p>
                <a href="{{ route('admin/peliculas') }}"><button type="button" class="btn btn-primary">Ver mas</button></a>
            </div>
            <div class="container_actores">
                <div class="container_title">
                    <h2>Actores</h2>
                </div>
                <p>En esta seccion podes ver un listado de actores, añadir y editar</p>
                <a href="{{ route('admin/actores') }}"><button type="button" class="btn btn-primary">Ver mas</button></a>
            </div>
        </section>    
    </main>
</body>
</html>