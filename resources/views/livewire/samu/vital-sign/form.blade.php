<div>
    <h5>
        @if($mode == 'create')
        Crear
        @else
        Editar Signo Vital #{{ $index + 1 }}
        @endif
    </h5>

    <div class="row g-2">
        <fieldset class="form-group col-sm-1">
            <label for="for-registered-at">Fecha<br>Hora</label>

            <input
                @if($type_input == null)
                    type="time"
                @else
                    type="{{ $type_input }}"
                @endif

                class="form-control @error('registered_at') is-invalid @enderror"
                id="for-registered-at"
                wire:model.debounce.1000ms="registered_at"
            >

            @error('registered_at')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-fc">Frecuencia <br>Cardiaca</label>

            <input
                type="text"
                class="form-control @error('fc') is-invalid @enderror"
                maxlength="8"
                id="for-fc"
                wire:model.debounce.1000ms="fc"
            >

            @error('fc')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-fr">Frecuencia <br>Respiratoria</label>

            <input
                type="number"
                class="form-control @error('fr') is-invalid @enderror"
                id="for-fr"
                wire:model.debounce.1000ms="fr"
            >

            @error('fr')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-pa">Presión <br>Arterial</label>

            <input
                type="text"
                class="form-control @error('pa') is-invalid @enderror"
                id="for-pa"
                placeholder="xxx/xx"
                wire:model.debounce.1000ms="pa"
            >
            @error('pa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-pam">Presión Arterial <br>Media</label>

            <input
                type="text"
                class="form-control @error('pam') is-invalid @enderror"
                id="for-pam"
                placeholder="xxx/xx"
                wire:model.debounce.1000ms="pam"
            >

            @error('pam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-gl">Glasgow<br>&nbsp;</label>

            <input
                type="number"
                class="form-control @error('gl') is-invalid @enderror"
                id="for-gl"
                wire:model.debounce.1000ms="gl"
            >

            @error('gl')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>

            <input
                type="number"
                class="form-control @error('soam') is-invalid @enderror"
                id="for-soam"
                wire:model.debounce.1000ms="soam"
            >

            @error('soam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>

            <input
                type="number"
                class="form-control @error('soap') is-invalid @enderror"
                id="for-soap"
                wire:model.debounce.1000ms="soap"
            >

            @error('soap')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-hgt">HGT <br>mg/dl</label>

            <input
                type="number"
                class="form-control @error('hgt') is-invalid @enderror"
                id="for-hgt"
                wire:model.debounce.1000ms="hgt"
            >

            @error('hgt')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-fill-capillary">Llene <br>Capilar</label>

            <input
                type="number"
                class="form-control @error('fill_capillary') is-invalid @enderror"
                id="for-fill-capillary"
                wire:model.debounce.1000ms="fill_capillary"
            >

            @error('fill_capillary')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-t">Temperatura <br>°C</label>

            <input
                type="number"
                class="form-control @error('t') is-invalid @enderror"
                step=".01"
                id="for-t"
                wire:model.debounce.1000ms="t"
            >

            @error('t')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label>Acciones <br> Signo Vital</label>
            @if($mode == 'create')
                <button
                    class="btn btn-md btn-primary"
                    title="Agregar"
                    wire:click.prevent="addVitalSign"
                    wire:loading.attr="disabled"
                    wire:target="addVitalSign"
                    @if($event && $event->status == false) disabled @endif
                >
                    <i class="fas fa-plus"></i>
                </button>
            @endif

            @if($mode == 'edit')
                <button
                    class="btn btn-md btn-primary"
                    title="Editar"
                    wire:click.prevent="updateVitalSign"
                    wire:loading.attr="disabled"
                    wire:target="updateVitalSign"
                >
                    <i class="fas fa-save"></i>
                </button>
            @endif

            <button
                    class="btn btn-md btn-secondary"
                    title="Cancelar"
                    wire:click.prevent="cancel"
                    @if($event && $event->status == false) disabled @endif
                >
                    <i class="fas fa-times"></i>
                </button>
        </fieldset>

    </div>
</div>
