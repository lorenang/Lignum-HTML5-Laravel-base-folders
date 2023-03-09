<div class="row">
    <div class="col-md-4">
        <div class="div_new">
            @include("livewire.actores.$view")
        </div>
    </div>
    <div class="col-md-8">
        <div class="mt-2 table-responsive-md">
            <table class="table table-striped">
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
                            <button type="button" class="btn btn-primary"
                                wire:click='edit({{ $ac->idActor }})'>Editar</button>
                            <button type="submit" class="btn btn-danger"
                                wire:click='destroy({{ $ac->idActor }})'>Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $actor->links('pagination::Bootstrap-4') }}
        </div>

    </div>
</div>
</div>