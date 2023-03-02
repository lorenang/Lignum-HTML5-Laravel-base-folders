<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if(!empty ($pelicula->id))
                <div class="mb-3">
                    <label for="year" class="negrita">Año:</label>
                    <div>
                        <input class="form-control" placeholder="{{ $pelicula->year }}" required="required" name="year" type="text" id="year" value="{{ $pelicula->year }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="negrita">Titulo:</label>
                    <div>
                        <input class="form-control" placeholder="Titulo" required="required" name="title" type="text" id="title" value="{{ $pelicula->title }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="time" class="negrita">Duracion:</label>
                    <div>
                        <input class="form-control" placeholder="{{ $pelicula->time }}" required="required" name="time"
                            type="text" id="time" value="{{ $pelicula->time }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="sinopsis" class="negrita">Sinopsis:</label>
                    <div>
                        <input class="form-control" placeholder="Sinopsis" required="required" name="sinopsis"
                            type="text" id="sinopsis" value="{{ $pelicula->sinopsis }}">
                    </div>
                </div>

                <div class="mb-3">
					@if ( !empty ( $pelicula->img) )
                    <span>Imagen Actual: </span>
                    <br>
                    <img src="../../../uploads/{{ $pelicula->img }}" width="300" class="img-fluid">
                    @else
					<label for="img" class="negrita">Selecciona una imagen:</label>
					<div>
						<input name="img" type="file" id="img">
                        Aún no se ha cargado una imagen para este producto
                    </div>
					@endif
                </div>

				<div class="mb-3">
                    <label for="ActorPrincipalID" class="negrita">Actor Principal:</label>
                    <select id="ActorPrincipalID" name="ActorPrincipalID">
                        @foreach($actor as $ac)
                        <option value="{{ $ac->idActor }}" id="idActor" name="idActor">{{ $ac->name }}</option>
                        @endforeach
                    </select>
                    <p>Si el actor principal no se encuentra en la lista despegable, por favor, añadalo desde <a
                            href="">aqui</a></p>
                </div>

                @else
                <div class="mb-3">
                    <label for="year" class="negrita">Año:</label>
                    <div>
                        <input placeholder="Año" class="form-control" required="required" name="year" type="text"
                            id="year">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="title" class="negrita">Titulo:</label>
                    <div>
                        <input class="form-control" placeholder="Titulo" required="required" name="title" type="text"
                            id="title">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="time" class="negrita">Duracion:</label>
                    <div>
                        <input class="form-control" placeholder="Duracion" required="required" name="time" type="text"
                            id="time">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="sinopsis" class="negrita">Sinopsis:</label>
                    <div>
                        <input class="form-control" placeholder="Sinopsis" required="required" name="sinopsis"
                            type="text" id="sinopsis">
                    </div>
                </div>

                <div class="mb-3" id="drop_zone">
                    <label for="img" class="negrita">Selecciona una imagen:</label>
                    <div>
                        <input name="img" type="file" id="img">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ActorPrincipalID" class="negrita">Actor Principal:</label>
                    <select id="ActorPrincipalID" name="ActorPrincipalID">
                        <option value="">Seleccione una opcion</option>
                        @foreach($actor as $ac)
                        <option value="{{ $ac->idActor }}" id="idActor" name="idActor">{{ $ac->name }}</option>
                        @endforeach
                    </select>
                    <p>Si el actor principal no se encuentra en la lista despegable, por favor, añadalo desde <a href="">aqui</a></p>
                </div>

                @endif

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-success">Limpiar</button>
                <a href="{{ route('admin/peliculas') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
    </div>
</div>