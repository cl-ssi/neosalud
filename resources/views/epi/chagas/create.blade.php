@extends('layouts.app')
@section('content')
    @include('chagas.nav')

    <h3 class="mb-3">Nueva Solicitud de Chagas</h3>


    <form method="POST" class="form-horizontal" action="{{ route('epi.chagas.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <fieldset class="form-group col-10 col-md-3">
                <input type="hidden" class="form-control" id="for_id" name="patient_id" value="{{ $patient->id }}">

                <input type="hidden" class="form-control" id="for_id" name="type" value="Chagas">
                <label for="for_run">Run/Identificación</label>

                <input type="number" max="50000000" class="form-control" id="for_run" name="run"
                    value="{{ $patient->Identification->value ?? '' }}" readonly>
            </fieldset>

            @if ($patient->identifierRun)
                <fieldset class="form-group col-2 col-md-1">
                    <label for="for_dv">DV</label>
                    <input type="text" class="form-control" id="for_dv" name="dv"
                        value="{{ $patient->identifierRun->dv }}" readonly>
                </fieldset>
            @endif

            <fieldset class="form-group col-12 col-md-3">
                <label for="for_other_identification">Otra identificación</label>
                <input type="text" class="form-control" id="for_other_identification" placeholder="Extranjeros sin run"
                    name="other_identification" readonly>
            </fieldset>

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_sex">Sexo</label>
                <select name="gender" id="for_sex" class="form-control sex" readonly>
                    <option value="male" {{ $patient->sex === 'male' ? 'selected' : '' }}>Masculino</option>
                    <option value="female" {{ $patient->sex === 'female' ? 'selected' : '' }}>Femenino</option>
                    <option value="other" {{ $patient->sex === 'other' ? 'selected' : '' }}>Otro</option>
                    <option value="unknown" {{ $patient->sex === 'unknown' ? 'selected' : '' }}>Desconocido</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_birthday">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="for_birthday" name="birthday"
                    value="{{ $patient->birthday ? $patient->birthday->format('Y-m-d') : '' }}" readonly required>
            </fieldset>

            <fieldset class="form-group col-2 col-md-1">
                <label for="for_age">Edad</label>
                <input type="number" class="form-control" id="for_age" name="age"
                    value={{ \Carbon\Carbon::parse($patient->birthday)->age }} readonly>
            </fieldset>

        </div>


        <div class="row">
            <fieldset class="form-group col-12 col-md-4">
                <label for="for_name">Nombres *</label>
                <input type="text" class="form-control" id="for_name" name="name" style="text-transform: uppercase;"
                    autocomplete="off" value="{{ $patient->actualOfficialHumanName->text ?? '' }}" readonly>
            </fieldset>

            <fieldset class="form-group col-6 col-md-4">
                <label for="for_fathers_family">Apellido Paterno *</label>
                <input type="text" class="form-control" id="for_fathers_family" name="fathers_family"
                    style="text-transform: uppercase;" autocomplete="off"
                    value="{{ $patient->actualOfficialHumanName->fathers_family ?? '' }}" readonly>
            </fieldset>

            <fieldset class="form-group col-6 col-md-4">
                <label for="for_mothers_family">Apellido Materno</label>
                <input type="text" class="form-control" id="for_mothers_family" name="mothers_family" autocomplete="off"
                    style="text-transform: uppercase;"
                    value="{{ $patient->actualOfficialHumanName->mothers_family ?? '' }}" readonly>
            </fieldset>


        </div>

        <hr>

        <div class="row">

            <fieldset class="form-group col-6 col-md-3">
                <label for="for_sample_at">Fecha Solicitud de Muestra</label>
                <input type="datetime-local" class="form-control" id="for_request" name="request_at"
                    value="{{ date('Y-m-d\TH:i:s') }}" required min="{{ date('Y-m-d\TH:i:s', strtotime('-2 week')) }}"
                    max="{{ date('Y-m-d\TH:i:s') }}">
            </fieldset>

            <fieldset class="form-group col-12 col-md-4">
                <label for="for_establishment_id">Establecimiento*</label>
                <select name="organization_id" id="for_organization_id" class="form-select" required>
                    <option value="{{ $organization->id }}">{{ $organization->alias ?? '' }}</option>
                </select>
            </fieldset>
        </div>



        <div class="row">
            <fieldset class="form-group col-6 col-md-3">
                <label for="for_sample_type">Grupo de Pesquiza</label>
                <select name="research_group" id="research_group" class="form-select" required>
                <option value=""></option>
                <option value="Control Pre concepcional" {{ old('research_group') == 'Control Pre concepcional' ? 'selected' : '' }}>Control Pre concepcional</option>
                <option value="Gestante (+semana gestacional)" {{ old('research_group') == 'Gestante (+semana gestacional)' ? 'selected' : '' }}>Gestante (+semana gestacional)</option>
                <option value="Estudio de contacto" {{ old('research_group') == 'Estudio de contacto' ? 'selected' : '' }}>Estudio de contacto</option>
                <option value="Morbilidad (cualquier persona)" {{ old('research_group') == 'Morbilidad (cualquier persona)' ? 'selected' : '' }}>Morbilidad (cualquier persona)</option>
                <option value="Transmisión Vertical" {{ old('research_group') == 'Transmisión Vertical' ? 'selected' : '' }}>Transmisión Vertical</option>
                <option value="Control Chagas Crónico" {{ old('research_group') == 'Control Chagas Crónico' ? 'selected' : '' }}>Control Chagas Crónico</option>
                <option value="Perdidas Productivas" {{ old('research_group') == 'Perdidas Productivas' ? 'selected' : '' }}>Perdidas Productivas</option>
            </select>
            </fieldset>

            <fieldset class="form-group col-2 col-md-1">
                <label for="newborn_week">Semanas</label>
                <input type="number" class="form-control" id="newborn_week" name="newborn_week" min="2"
                    max="44" value="{{ old('newborn_week') }}" disabled>
            </fieldset>
        </div>


        <div class="row">
            <div id="seccion_transmision_vertical" style="display:none;">
                <fieldset class="form-group">
                    <label for="mothers_run">Madre</label>
                    @livewire('epi.search-patient-chagas')
                </fieldset>
            </div>
        </div>

        <div class="form-row">
            <fieldset class="form-group col-6 col-md-6">
                <label for="for_observation">Observación</label>
                <input type="text" class="form-control" name="observation" id="for_observation" autocomplete="off"
                    value="{{ old('observation') }}">
            </fieldset>
        </div>

        <br>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-outline-secondary" onclick="goBack()">Cancelar</a>
            </div>
        </div>
    </form>
@endsection

@section('custom_js')
    <script src='{{ asset('js/jquery.rut.chileno.js') }}'></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('input[name=run]').keyup(function(e) {
                var str = $("#for_run").val();
                $('#for_dv').val($.rut.dv(str));
            });

        });
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/defaults-es_CL.min.js') }}"></script>

    @section('custom_js')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
        // función para manejar el cambio de valor y la carga inicial
        function handleValueChange() {
            var value = $('#research_group').val();

            //código para Gestante
            if (value == "Gestante (+semana gestacional)") {
                $('#newborn_week').removeAttr('disabled');
                $("#newborn_week").prop('required', true);
            } else {
                $('#newborn_week').attr('disabled', 'disabled');
                $("#newborn_week").prop('required', false);
            }

            //condicional para mostrar la sección oculta que se muestra solo con Transmisión Vertical
            if (value == "Transmisión Vertical") {
                $('#seccion_transmision_vertical').show();
            } else {
                $('#seccion_transmision_vertical').hide();
            }
        }

        // llamar a la función para manejar la carga inicial
        handleValueChange();

        // llamar a la función para manejar el cambio de valor
        $('#research_group').on('change', handleValueChange);
    });
</script>
@endsection