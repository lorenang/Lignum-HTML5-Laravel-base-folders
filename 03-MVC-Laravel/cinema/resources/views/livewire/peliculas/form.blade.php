<!--Si falla la validación, se lanza un estándar ValidationException(y Livewire lo captura), y el $errorsobjeto estándar está disponible dentro de la vista del componente.-->
<div class="row">
    <div class="panel-body">
        <!--directiva para que la escucha de los eventos del navegador sea trivial.
        wire:[dispatched browser event]="[action]".-->
        <div class="panel_info align-center">
                <div class="mb-3">
                    <label for="year" class="negrita">Año:</label>
                    <input class="form-control" type="text" wire:model='year'>
                    @error('year') <span>{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="negrita">Titulo:</label>
                    <input class="form-control" wire:model="title" type="text">
                    @error('title') <span>{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="time" class="negrita">Duracion:</label>
                    <input class="form-control" wire:model="time" type="text" id="time">
                    @error('time') <span>{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="negrita">Sinopsis:</label>
                <input class="form-control input_sinopsis" wire:model="sinopsis" type="text" id="sinopsis">
                @error('sinopsis') <span>{{ $message }}</span> @enderror
            </div>


            <div class="mb-3" id="drop_zone">
                <label for="img" class="negrita">Selecciona una imagen:</label>
                <form wire:submit.prevent="save">
                    <input type="file" wire:model="img">
                    @error('img') <span class="error">{{ $message }}</span> @enderror
                </form>
            </div>



            <div class="panel_actor">
                <div class="mb-3">
                    <label for="ActorPrincipalID" class="negrita">Actor Principal: </label>
                    <select id="ActorPrincipalID" name="ActorPrincipalID" wire:model="ActorPrincipalID">
                        <option value="">Seleccione una opcion</option>
                        @foreach($actor as $ac)
                        <option value="{{ $ac->idActor }}" id="idActor" name="idActor">{{ $ac->name }}</option>
                        @endforeach
                    </select>
                    @error('ActorPrincipalID') <span>{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="ActorSecundarioID" class="negrita">Actor Secundario: </label>
                    <select id="ActorSecundarioID" name="ActorSecundarioID" wire:model="ActorSecundarioID">
                        <option value="">Seleccione una opcion</option>
                        @foreach($actor as $ac)
                        <option value="{{ $ac->idActor }}" id="idActor" name="idActor">{{ $ac->name }}</option>
                        @endforeach
                    </select>
                    @error('ActorSecundarioID') <span>{{ $message }}</span> @enderror
                </div>
            </div>

    </div>
</div>