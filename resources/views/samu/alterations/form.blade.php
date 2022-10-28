<div class="form-row mb-3">
    <fieldset class="col-md-2">
        <label for="for-name">Tipo*</label>
        <!-- <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror -->
        <select class="form-control" name="type" wire:model="type" required>
            <option value=""></option>
            <option>CARDIOVASCULARES</option>
            <option>RESPIRATORIAS</option>
            <option>DIGESTIVAS</option>
            <option>OBSTETRICAS</option>
            <option>SNC</option>
            <option>METABÓLICAS</option>
            <option>OTRAS</option>
        </select>
    </fieldset>

    <fieldset class="col-md-2">
        <label for="for-name">Nombre*</label>
        <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </fieldset>
</div>