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
                @if($type_input==null)
                type="time"
                @else
                type="{{ $type_input }}"
                @endif

                class="form-control @error('registered_at') is-invalid @enderror"
                id="for-registered-at"
                wire:model.defer="registered_at">

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
                wire:model.defer="fc">

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
                wire:model.defer="fr">

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
                wire:model.defer="pa">
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
                wire:model.defer="pam">

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
                wire:model.defer="gl">

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
                wire:model.defer="soam">

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
                wire:model.defer="soap">

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
                wire:model.defer="hgt">

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
                wire:model.defer="fill_capillary">

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
                wire:model.defer="t">

            @error('t')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-p">Peso</label>

            <input
                type="number"
                class="form-control @error('p') is-invalid @enderror"
                id="for-p"
                wire:model.defer="p">

            @error('p')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-sm-1">
            <label for="for-lcf">LCF</label>

            <input
                type="number"
                class="form-control @error('lcf') is-invalid @enderror"
                id="for-lcf"
                wire:model.defer="lcf">

            @error('lcf')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-sm-1">
            <label for="for-eva">EVA</label>

            <input
                type="number"
                class="form-control @error('eva') is-invalid @enderror"
                id="for-eva"
                wire:model.defer="eva">

            @error('eva')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-sm-1">
            <label for="for-co2">CO 2</label>

            <input
                type="number"
                class="form-control @error('co2') is-invalid @enderror"
                id="for-co2"
                wire:model.defer="co2">

            @error('co2')
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

                @if($edit==true && $event && $event->status == false) disabled @endif
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
                wire:target="updateVitalSign">
                <i class="fas fa-save"></i>
            </button>
            @endif

            <button
                class="btn btn-md btn-secondary"
                title="Cancelar"
                wire:click.prevent="cancel"
                @if($edit==true && $event && $event->status == false) disabled @endif
                >
                <i class="fas fa-times"></i>
            </button>
        </fieldset>

    </div>
</div>