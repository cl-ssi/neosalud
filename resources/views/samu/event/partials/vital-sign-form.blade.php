<div class="row g-2">
    <fieldset class="form-group col-sm-1">
        <label for="for-registered-at">Hora<br>&nbsp;</label>

        <input
            value="{{ $edit ? optional(optional($event->vitalSign)->registered_at)->format('H:i') : old('registered_at') }}"
            name="registered_at"
            type="time"
            class="form-control @error('registered_at') is-invalid @enderror"
            id="for-registered-at">

        @error('registered_at')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-fc">Frecuencia <br>Cardiaca</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->fc : old('fc') }}"
            name="fc"
            type="text"
            class="form-control @error('fc') is-invalid @enderror"
            maxlength="8"
            id="for-fc">

        @error('fc')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-fr">Frecuencia <br>Respiratoria</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->fr : old('fr') }}"
            name="fr"
            type="number"
            class="form-control @error('fr') is-invalid @enderror"
            id="for-fr">

        @error('fr')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-pa">Presión <br>Arterial</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->pa : old('pa') }}"
            name="pa"
            type="text"
            class="form-control @error('pa') is-invalid @enderror"
            id="for-pa"
            placeholder="xxx/xx">
        @error('pa')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-pam">Presión Arterial <br>Media</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->pam : old('pam') }}"
            name="pam"
            type="text"
            class="form-control @error('pam') is-invalid @enderror"
            id="for-pam"
            placeholder="xxx/xx">

        @error('pam')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-gl">Glasgow<br>&nbsp;</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->gl : old('gl') }}"
            name="gl"
            type="number"
            class="form-control @error('gl') is-invalid @enderror"
            id="for-gl">

        @error('gl')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->soam : old('soam') }}"
            name="soam"
            type="number"
            class="form-control @error('soam') is-invalid @enderror"
            id="for-soam">

        @error('soam')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->soap : old('soap') }}"
            name="soap"
            type="number"
            class="form-control @error('soap') is-invalid @enderror"
            id="for-soap">

        @error('soap')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-hgt">HGT <br>mg/dl</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->hgt : old('hgt') }}"
            name="hgt"
            type="number"
            class="form-control @error('hgt') is-invalid @enderror"
            id="for-hgt">

        @error('hgt')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-fill-capillary">Llene <br>Capilar</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->fill_capillary : old('fill_capillary') }}"
            name="fill_capillary"
            type="number"
            class="form-control @error('fill_capillary') is-invalid @enderror"
            id="for-fill-capillary">

        @error('fill_capillary')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for-t">Temperatura <br>°C</label>

        <input
            value="{{ $edit ? optional($event->vitalSign)->t : old('t') }}"
            name="t"
            type="number"
            class="form-control @error('t') is-invalid @enderror"
            step=".01"
            id="for-t">

        @error('t')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>
</div>
