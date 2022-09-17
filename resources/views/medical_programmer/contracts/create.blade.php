@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Nuevo Contrato</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.contracts.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-11 col-md-3">
            <label for="for_user_id">ID</label>
            <input type="text" class="form-control" id="for_user_label" disabled>
        </fieldset>

        <!-- <input type="hidden" class="form-control" id="for_user_id2" name="user_id"> -->

        <!-- <fieldset class="form-group col-8">
            <label for="for_user_id">Especialista</label>
            <input type="text" class="form-control" id="search" name="" value="">
            <input type="hidden" name="user_id" id="user_id" value="">
        </fieldset> -->

        @livewire('medical_programmer.select-med-prog-employee',['type'         => $request->type,
                                                                 'specialty_id' => $request->specialty_id,
                                                                 'profession_id'=> $request->profession_id,
                                                                 'user_id'      => $request->user_id,
                                                                 'contract_enable' => 0,
                                                                 'required_enabled' => 1])
    </div>

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_law">Ley</label>
            <select name="law" id="law" class="form-control" required="">
              <option value="LEY 18.834">LEY 18.834</option>
              <option value="LEY 19.664">LEY 19.664</option>
              <option value="LEY 15.076">LEY 15.076</option>
              <option value="HSA">HSA</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_contract_id">Correlativo Contrato</label>
            <input type="text" class="form-control" id="for_contract_id" placeholder="(opcional)" name="contract_id">
        </fieldset>

        <fieldset class="form-group col-8 col-md-3">
            <label for="for_weekly_hours">Hrs. Semanales contratadas *</label>
            <input type="text" class="form-control" id="for_weekly_hours" placeholder="" name="weekly_hours" required>
        </fieldset>

        <fieldset class="form-group col-4 col-md-3">
            <label for="for_shift_system">Sistema Turno</label>
            <select name="shift_system" id="for_shift_system" class="form-control">
              <option value="">--</option>
              <option value="S">Sí</option>
              <option value="N">No</option>
            </select>
        </fieldset>
    </div>

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_obs">Observaciones (liberado de guardia)</label>
            <input type="text" class="form-control" id="for_obs" name="obs">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_compensatory_rest">Días descanso compensatorio</label>
            <input type="text" class="form-control" id="for_compensatory_rest" name="compensatory_rest">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_administrative_permit">Días permisos administrativos</label>
            <input type="text" class="form-control" id="for_administrative_permit" name="administrative_permit">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_training_days">Días congreso o capacitación</label>
            <input type="text" class="form-control" id="for_training_days" name="training_days">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_legal_holidays">Feriados legales</label>
            <input type="text" class="form-control" id="for_legal_holidays" name="legal_holidays">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_breastfeeding_time">Tiempo lactancia (min)</label>
            <input type="text" class="form-control" id="for_breastfeeding_time" name="breastfeeding_time">
        </fieldset>

        <fieldset class="form-group col col-md-3">
            <label for="for_weekly_collation">Tiempo colación semanal (min)</label>
            <input type="text" class="form-control" id="for_weekly_collation" name="weekly_collation">
        </fieldset>
    </div>


    <div class="form-row">
        <fieldset class="form-group col-4 col-md-2">
            <label for="for_contract_start_date">Fecha inicio contrato</label>
            <input type="date" class="form-control" id="for_contract_start_date" name="contract_start_date" required >
        </fieldset>

        <fieldset class="form-group col-4 col-md-2">
            <label for="for_contract_end_date">Fecha término contrato</label>
            <input type="date" class="form-control" id="for_contract_end_date" name="contract_end_date" required >
        </fieldset>

        <!-- <fieldset class="form-group col">
            <label for="for_unit">Servicio / Unidad</label>
            <input type="text" class="form-control" id="for_unit" name="unit">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_unit_code">Cod. Unidad</label>
            <input type="text" class="form-control" id="for_unit_code" name="unit_code">
        </fieldset> -->

        <!-- TODO: cambiar a algo no estático -->
        <fieldset class="form-group col-4 col-md-2">
            <label for="for_unit_code">Año contrato válido</label>
            <select name="year" id="for_year" class="form-control" required="">
                <option value="2020" {{ 2020 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ 2021 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ 2022 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ 2023 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ 2024 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ 2025 == Carbon\Carbon::now()->format('Y') ? 'selected' : '' }}>2025</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-12 col-md-6">
            <label for="for_unit_code">Servicio</label>
            <select name="service_id" id="for_service_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
              @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->service_name}}</option>
              @endforeach
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary mt-1 mb-4">Guardar</button>

</form>

@endsection

@section('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

<!-- <script>
$( "#rrhh" ).change(function() {
  $( "#for_user_id" ).val($( "#rrhh" ).val());
  $( "#for_user_id2" ).val($( "#rrhh" ).val());
});
</script> -->

<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">

<script>

// $('#search').autocomplete({
//    source: function(request, response){
// 	 $.ajax({
//            url: "{{route('user.search_by_name')}}",
//            dataType: 'json',
//            async: false,
//            data: {
//              term: request.term
//            },
//            success: function(data){
//              response(data)
// 	         }
//    });
//  },
//   select: function(event, ui) {
//      $("#for_user_id").val(ui.item.id),
//      $("#for_user_label").val(ui.item.id)
//   }
// });

$( "#for_user_id" ).change(function() {
  $("#for_user_label").val($(this).val());
});


</script>
@endsection
