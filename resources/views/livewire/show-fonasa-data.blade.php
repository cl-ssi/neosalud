<div class="row g-2">

    <fieldset class="form-group col-sm-2">
        <label for="for-identifier-type">Tipo de identificación</label>
        <select class="form-select {{-- @error('patient_identifier_type_id') is-invalid @enderror --}}"
            wire:model="patient_identifier_type_id"
            name="patient_identifier_type_id" id="for-identifier-type">
            <option value="">Seleccione...</option>
            @foreach($identifierTypes as $text => $id)
                <option value="{{ $id }}" {{-- old('patient_identifier_type_id', optional($event)->patient_identifier_type_id) == $id ? 'selected' : '' --}}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        @error('patient_identifier_type_id')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    @if($runInput)
    <fieldset class="form-group col-sm-3">
        <label for="profiles">Run <span class="text-danger">{{ $error_fonasa ?? '' }}</span></label>
        <div class="input-group">
            <input type="number" class="form-control" id="for_run"
                wire:model.debounce.400ms="run"
                placeholder="Sin dígito verificador"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength = "8" required>

                <span class="input-group-text">{{ $dv }}</span>

                <button type="button" class="btn btn-success" id="for_fonasa_button" wire:click="fonasa_search">
                    <i class="fas fa-search"></i> FONASA
                </button>
            </div>
    </fieldset>
    @endif

    @if($otherIdentificationInput)
    <fieldset class="form-group col-sm-3">
        <label for="for-patient-identification">Identificación</label>
        <input type="text" class="form-control {{-- @error('patient_identification') is-invalid @enderror --}}"
            id="for_patient_identification"
            value="{{-- old('patient_identification', optional($event)->patient_identification) --}}"
            wire:model.debounce.500ms="patient_other_identification">
        @error('patient_identification')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>
    @endif
    
    <fieldset class="form-group col-sm-5">
        <label for="for-patient-name">Nombre del paciente</label>
        <input type="text" class="form-control {{-- @error('patient_name') is-invalid @enderror --}}"
        wire:model="patient_name"
        name="patient_name"
        id="for-patient-full-name">
        @error('patient_name')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </fieldset>
    
    <input type="hidden" name="patient_identification" wire:model="patient_identification">

</div>


