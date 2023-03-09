<div class="form-group">
    <label for="name" class="negrita">Nombre:</label>
    <input class="form-control" type="text" wire:model='name'>
    @error('name') <span>{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="birthdate" class="negrita">Cumpleaños:</label>
    <input class="form-control" type="date" wire:model='birthdate'>
    @error('birthdate') <span>{{ $message }}</span> @enderror
</div>



