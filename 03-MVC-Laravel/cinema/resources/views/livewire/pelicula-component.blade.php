<div class="row">
   
    <div class="">
        <div class="div_new">
            @include("livewire.peliculas.$view")
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Año</th>
                    <th>Titulo</th>
                    <th>Duracion</th>
                    <th>Sinopsis</th>
                    <th>Portada</th>
                    <th>Actor Principal</th>
                    <th>Actor Secundario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $peli)
                <tr>
                    <td class="v-align-middle">{{$peli->idPelicula}}</td>
                    <td class="v-align-middle">{{$peli->year}}</td>
                    <td class="v-align-middle">{{$peli->title}}</td>
                    <td class="v-align-middle">{{$peli->time}}</td>
                    <td class="v-align-middle">{{$peli->sinopsis}}</td>
                    <td class="v-align-middle">
                        <img src="{{ asset('uploads/' . $peli->img) }}" width="50" class="img-responsive"></td>
                    <td class="v-align-middle">{{$peli->actor->name}}</td>
                    <td class="v-align-middle">{{$peli->actorSec->name}}</td>
                    <td class="v-align-middle text-center td_aciones">
                        <a href="{{ route('admin/peliculas/show',$peli->idPelicula) }}" class="btn btn-outline-primary">Mas</a>
                        <button type="button" class="btn btn-outline-warning" wire:click='edit({{ $peli->idPelicula }})'>Editar</button>
                        <button type="submit" class="btn btn-outline-danger" wire:click='destroy({{ $peli->idPelicula }})'>Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $peliculas->links('pagination::Bootstrap-4') }}  
    </div>

    <div class="example mt-4 section_search">
        <div class="div_new">
            @include("admin.peliculas.search")
        </div>
    </div>

</div>