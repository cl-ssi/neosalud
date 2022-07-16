<div class="row g-2">

    <fieldset class="form-group col-sm-2">
        <label for="for-identifier-type">Tipo de identificación</label>
        <select class="form-select" id="for-identifier-type"
            name="patient_identifier_type_id" 
            wire:model="patient_identifier_type_id">
            
            <option value="">Seleccione...</option>
            @foreach($identifierTypes as $text => $id)
                <option value="{{ $id }}">{{ $text }}</option>
            @endforeach
        </select>
    </fieldset>

    @if($runInput)
    <fieldset class="form-group col-sm-3">
        <label for="for-run">Run</label>
        <div class="input-group">
            <input type="number" class="form-control" id="for-run"
                wire:model.debounce.500ms="run"
                placeholder="Sin dígito verificador"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength = "8" required>

            <span class="input-group-text">{{ $dv }}</span>

            <button type="button" class="btn btn-success" id="for_fonasa_button" wire:click="fonasa_search">
                <i class="fas fa-search"></i> FONASA
            </button>
        </div>
        <div class="text-danger">
            <small>{{ $error_fonasa ?? '' }}</small>
        </div>
    </fieldset>
    @endif

    @if($otherIdentificationInput)
    <fieldset class="form-group col-sm-3">
        <label for="for-patient_other_identification">Identificación</label>
        <input type="text" class="form-control"
            id="for-patient_other_identification"
            wire:model.debounce.500ms="patient_other_identification">
    </fieldset>
    @endif
    
    <fieldset class="form-group col-sm-5">
        <label for="for-patient_name">Nombre del paciente</label>
        <input type="text" class="form-control"
            wire:model.debounce.500ms="patient_name"
            name="patient_name"
            id="for-patient_name">
    </fieldset>
    
    <input type="hidden" name="patient_identification" wire:model="patient_identification">

</div>


