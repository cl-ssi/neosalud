<div>
    @include('samu.nav')

    <h3 class="mb-3">
        <i class="fas fa-blender-phone"></i> Editar Fecha
    </h3>

    <div class="row mb-2">
        <div class="col-md-6">
            <fieldset class="col">
                <label for="user-id">Usuario</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $shiftUser->user->text }}"
                    required="required"
                    id="user-id"
                    disabled
                >
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset class="col">
                <label for="job-type-id">Tipo Funcionario</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $shiftUser->jobType->name }}"
                    required="required"
                    id="job-type-id"
                    disabled
                >
            </fieldset>
        </div>
    </div>

    <div class="row mb-2">
        <fieldset class="form-group col-sm-6">
            <label for="assumes-at">Asume</label>
            <input
                type="datetime-local"
                class="form-control @error('assumes_at') is-invalid @enderror"
                wire:model="assumes_at"
                id="assumes-at"
            >
            @error('assumes_at')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-6">
            <label for="leaves-at">Se retira</label>
            <input
                type="datetime-local"
                class="form-control @error('leaves_at') is-invalid @enderror"
                wire:model="leaves_at"
                id="leaves-at"
            >
            @error('leaves_at')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="col-12">
            <button class="btn btn-primary" wire:click="edit">
                <i class="fas fa-plus"></i> Actualizar
            </button>
        </fieldset>
    </div>
</div>
