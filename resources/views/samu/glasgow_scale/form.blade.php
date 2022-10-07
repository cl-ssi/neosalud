<div class="form-row mb-3">

    <fieldset class="col-md-2">
        <label for="for-name">Rango etario*</label>
        <select class="form-control" name="age_range" wire:model="age_range" required>
            <option value=""></option>
            <option>Adulto</option>
            <option>Lactante</option>
        </select>
    </fieldset>

    <fieldset class="col-md-2">
        <label for="for-name">Tipo*</label>
        <select class="form-control" name="type" wire:model="type" required>
            <option value=""></option>
            <option>Ocular</option>
            <option>Verbal</option>
            <option>Motora</option>
        </select>
    </fieldset>

    <fieldset class="col-md-2">
        <label for="for-name">Nombre*</label>
        <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </fieldset>

    <fieldset class="col-md-2">
        <label for="for-name">Valor*</label>
        <input type="numeric" wire:model="value" class="form-control">
        @error('value') <span class="text-danger">{{ $message }}</span> @enderror
    </fieldset>
</div>