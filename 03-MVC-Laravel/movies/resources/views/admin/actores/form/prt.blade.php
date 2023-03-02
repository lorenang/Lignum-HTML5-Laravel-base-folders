<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if(!empty ($actor->idActor))
                <div class="mb-3">
                    <label for="name" class="negrita">Nombre:</label>
                    <div>
                        <input class="form-control" placeholder="{{ $actor->name }}" required="required" name="name" type="text" id="name" value="{{ $actor->name }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="negrita">Cumpleaños:</label>
                    <div>
                        <input class="form-control" placeholder="{{ $actor->birthdate }}" required="required" name="birthdate" type="date" id="birthdate" value="{{ $actor->birthdate }}">
                    </div>
                </div>

                @else
                <div class="mb-3">
                    <label for="name" class="negrita">Nombre:</label>
                    <div>
                        <input class="form-control" placeholder="Nombre" required="required" name="name" type="text" id="name">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="negrita">Cumpleaños:</label>
                    <div>
                        <input class="form-control" placeholder="Cumpleaños" required="required" name="birthdate" type="date" id="birthdate">
                    </div>
                </div>

                @endif

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-success">Limpiar</button>
                <a href="{{ route('admin/actores') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
    </div>
</div>