<div>

    <div class="row g-2">
        <fieldset class="form-group col-sm-2">
            <label for="for-identifier-type">Tipo de identificación</label>
            <select
                class="form-select"
                id="for-identifier-type"
                name="patient_identifier_type_id"
                wire:model="patient_identifier_type_id"
            >
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
                <input
                    type="number"
                    class="form-control"
                    id="for-run"
                    wire:model.debounce.500ms="run"
                    placeholder="Sin dígito verificador"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="8"
                    required
                >

                <span class="input-group-text">{{ $dv }}</span>

                <button
                    type="button"
                    class="btn btn-success"
                    id="for_fonasa_button"
                    wire:click="fonasa_search"
                    wire:loading.attr="disabled"
                    wire:target="fonasa_search"
                >

                    <span wire:loading.remove wire:target="fonasa_search">
                        <i class="fas fa-search"></i>
                    </span>

                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                        wire:loading
                        wire:target="fonasa_search">
                    </span>

                    FONASA
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
            <input
                type="text"
                class="form-control"
                id="for-patient_other_identification"
                wire:model.debounce.500ms="patient_other_identification"
            >
        </fieldset>
        @endif

        <fieldset class="form-group col-sm-5">
            <label for="for-patient_name">Nombre del paciente</label>
            <input
                type="text"
                class="form-control"
                wire:model.debounce.1000ms="patient_name"
                name="patient_name"
                id="for-patient_name"
                @if($disabled) readonly @endif
            >
        </fieldset>

        <input type="hidden" name="patient_identification" wire:model="patient_identification">
    </div>

    <div class="row g-2 mt-2">
        <input type="hidden" name="age_year" value="{{ $age_year }}">
        <input type="hidden" name="age_month" value="{{ $age_month }}">
        <input type="hidden" name="prevision" value="{{ $prevision }}">
        <input type="hidden" name="gender_id" value="{{ $gender_id }}">
        <input type="hidden" name="verified_fonasa_at" value="{{ $verified_fonasa_at }}">
        <input type="hidden" name="run_fixed" value="{{ $run_fixed }}">

        <fieldset class="form-group col-sm-3">
            <label for="for-gender-id">Género</label>
            <select
                class="form-select input-disabled"
                id="for-gender-id"
                name="gender_id"
                wire:model="gender_id"
                @if($disabled) disabled @endif
            >
                <option value="">Seleccione un género</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->text }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-prevision">Previsión</label>
            <select
                class="form-select input-disabled"
                id="for-prevision"
                name="prevision"
                wire:model="prevision"
                @if($disabled) disabled @endif
            >
                <option value="">Seleccione una previsión</option>
                @foreach($previsions as $prevision)
                    <option value="{{ $prevision }}">
                        {{ $prevision }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-birthday">Fecha Nacimiento</label>
            <input
                type="date"
                class="form-control"
                id="for-birthday"
                name="birthday"
                wire:model.debounce.1000ms="birthday"
                @if($disabled) readonly @endif
            >
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-age">Edad</label>
            <div class="input-group mb-3">
                <input
                    type="text"
                    id="for-age"
                    class="form-control"
                    @if($age_year && $age_year >= 0)
                        value="{{ $age_year }} {{ ($age_year == 1) ? "año" : "años" }}"
                    @elseif($age_month && $age_year == 0)
                        value="{{ $age_month }} {{ ($age_month == 1) ? "mes" : "meses" }}"
                    @endif
                    readonly
                >
                <span class="input-group-text" id="for-age">
                    @if($age_year != null || $age_month)
                        <span
                            wire:loading.remove
                            wire:target="birthday, fonasa_search"
                        >
                            <i class="fas fa-check"></i>
                        </span>
                    @else
                        <span
                            wire:loading.remove
                            wire:target="birthday, fonasa_search"
                        >
                            <i class="fas fa-times"></i>
                        </span>
                    @endif

                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                        wire:loading
                        wire:target="birthday, fonasa_search">
                    </span>

                </span>

            </div>

        </fieldset>
    </div>

</div>