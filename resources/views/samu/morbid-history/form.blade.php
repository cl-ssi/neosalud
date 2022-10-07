<div class="form-row mb-3">
    <fieldset class="col-md-2">
        <label for="for-name">Nombre*</label>
        <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </fieldset>
</div>