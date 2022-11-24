@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Editar Contrato</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.contracts.update', $contract) }}">
  @csrf
  @method('PUT')

    <div class="row">
        <fieldset class="col-4">
            <label for="for_user_id">Rut</label>
            <input type="text" class="form-control" id="for_user_id" disabled value="{{$contract->user->IdentifierRun->value}}">
        </fieldset>

        <input type="hidden" class="form-control" id="for_user_id2" name="user_id" value="{{$contract->user_id}}">

        <fieldset class="col-8">
            <label for="for_rrhh">Especialista</label>
            <select name="rrhh" id="rrhh" class="form-control" required="" disabled data-size="5">
              <!-- <option>--</option> -->
              @foreach($users as $user)
                <option value="{{$user->id}}" {{ $user->id == $contract->user_id ? 'selected' : '' }}>{{$user->OfficialFullName}}</option>
              @endforeach
            </select>
        </fieldset>
    </div>

    <div class="row">

        <fieldset class="col">
            <label for="for_establishment_id">Establecimiento</label>
            <select name="establishment_id" id="for_establishment_id" class="form-control" required="">
                @foreach($organizations as $organization)
                    <option value="{{$organization->id}}" {{ $contract->establishment_id == $organization->id ? 'selected' : '' }}>{{$organization->name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col-2">
            <label for="for_law">Ley</label>
            <select name="law" id="law" class="form-control" required="">
              <option value="LEY 18.834" {{ $contract->law == "LEY 18.834" ? 'selected' : '' }}>LEY 18.834</option>
              <option value="LEY 19.664" {{ $contract->law == "LEY 19.664" ? 'selected' : '' }}>LEY 19.664</option>
              <option value="LEY 15.076" {{ $contract->law == "LEY 15.076" ? 'selected' : '' }}>LEY 15.076</option>
              <option value="HSA" {{ $contract->law == "HSA" ? 'selected' : '' }}>HSA</option>
            </select>
        </fieldset>

        <fieldset class="col-2">
            <label for="for_contract_id">Correlativo Contrato</label>
            <input type="text" class="form-control" id="for_contract_id" placeholder="(opcional)" name="contract_id" value="{{$contract->contract_id}}">
        </fieldset>

        <fieldset class="col-2">
            <label for="for_shift_system">Sistema de turno</label>
            <select name="shift_system" id="for_shift_system" class="form-control">
              <option value="" {{ $contract->shift_system == "" ? 'selected' : '' }}>--</option>
              <option value="S" {{ $contract->shift_system == "S" ? 'selected' : '' }}>Sí</option>
              <option value="N" {{ $contract->shift_system == "N" ? 'selected' : '' }}>No</option>
            </select>
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="col">
            <label for="for_weekly_hours">Hrs.Semanales contratadas</label>
            <input type="text" class="form-control" id="for_weekly_hours" placeholder="" name="weekly_hours" required value="{{$contract->weekly_hours}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_effective_hours">Hrs. efectivas al centro</label>
            <input type="number" class="form-control" id="for_effective_hours" value="{{$contract->effective_hours}}" name="effective_hours">
        </fieldset>

        <fieldset class="col">
            <label for="for_weekly_collation">Tiempo colación semanal (min)</label>
            <input type="text" class="form-control" id="for_weekly_collation" name="weekly_collation" value="{{$contract->weekly_collation}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_weekly_union_permit">Tiempo de permiso gremial semanal (min)</label>
            <input type="number" class="form-control" id="for_weekly_union_permit" value="{{$contract->weekly_union_permit}}" name="weekly_union_permit">
        </fieldset>

        <fieldset class="col">
            <label for="for_breastfeeding_time">Tiempo lactancia (min)</label>
            <input type="text" class="form-control" id="for_breastfeeding_time" name="breastfeeding_time" value="{{$contract->breastfeeding_time}}">
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="col">
            <label for="for_obs">Observaciones (liberado de guardia)</label>
            <input type="text" class="form-control" id="for_obs" name="obs" value="{{$contract->obs}}">
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="col">
            <label for="for_legal_holidays">Feriados legales</label>
            <input type="text" class="form-control" id="for_legal_holidays" name="legal_holidays" value="{{$contract->legal_holidays}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_compensatory_rest">Días descanso compensatorio (Ley urgencias)</label>
            <input type="text" class="form-control" id="for_compensatory_rest" name="compensatory_rest" value="{{$contract->compensatory_rest}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_administrative_permit">Días permisos administrativos</label>
            <input type="text" class="form-control" id="for_administrative_permit" name="administrative_permit" value="{{$contract->administrative_permit}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_training_days">Días congreso o capacitación</label>
            <input type="text" class="form-control" id="for_training_days" name="training_days" value="{{$contract->training_days}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_covid_permit">Descanzo reparatorio covid utilizado</label>
            <input type="text" class="form-control" id="for_covid_permit" name="covid_permit" value="{{$contract->covid_permit}}">
        </fieldset>
    </div>


    <div class="row">
        <fieldset class="col">
            <label for="for_contract_start_date">Fecha inicio contrato</label>
            <input type="date" class="form-control" id="for_contract_start_date" name="contract_start_date" required  value="{{$contract->contract_start_date}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_contract_end_date">Fecha término contrato</label>
            <input type="date" class="form-control" id="for_contract_end_date" name="contract_end_date" required  value="{{$contract->contract_end_date}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_departure_date">Fecha alejamiento</label>
            <input type="date" class="form-control" id="for_departure_date" name="departure_date" required value="{{$contract->departure_date}}">
        </fieldset>

        <!-- <fieldset class="col">
            <label for="for_unit">Servicio / Unidad</label>
            <input type="text" class="form-control" id="for_unit" name="unit" value="{{$contract->unit}}">
        </fieldset>

        <fieldset class="col">
            <label for="for_unit_code">Cod. Unidad</label>
            <input type="text" class="form-control" id="for_unit_code" name="unit_code" value="{{$contract->unit_code}}">
        </fieldset> -->

        <fieldset class="col">
            <label for="for_unit_code">Año de contrato válido</label>
            <select name="year" id="for_year" class="form-control" required="">
                <option value="2020" {{ $contract->year == "2020" ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ $contract->year == "2021" ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ $contract->year == "2022" ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ $contract->year == "2023" ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ $contract->year == "2024" ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ $contract->year == "2025" ? 'selected' : '' }}>2025</option>
            </select>
        </fieldset>

        <fieldset class="col">
            <label for="for_unit_code">Servicio</label>
            <select name="service_id" id="for_service_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
              @foreach($services as $service)
                <option value="{{$service->id}}" {{ $service->id == $contract->service_id ? 'selected' : '' }}>{{$service->service_name}}</option>
              @endforeach
            </select>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $contract->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

<script>
$( "#rrhh" ).change(function() {
  $( "#for_user_id" ).val($( "#rrhh" ).val());
  $( "#for_user_id2" ).val($( "#rrhh" ).val());
});
</script>
@endsection
