@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Crear Propuestas</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.store') }}">
@csrf
@method('POST')

<div class="row">
  <fieldset class="form-group col col-md-4">
      <label for="for_id_deis">Tipo</label>
      <select class="form-control" name="proposal_type">
        <option value=""></option>
        <option value="Nuevo horario">Nuevo horario</option>
        <option value="Reprogramación">Reprogramación</option>
        <!-- <option value="Reasignación">Permisos administrativos</option> -->
        <option value="Eliminación">Eliminación</option>
      </select>
  </fieldset>
  <fieldset class="form-group col col-md">
      <label for="for_id_deis">Fecha Inicio</label>
      <input type="date" class="form-control" name="start_date">
  </fieldset>

  <fieldset class="form-group col col-md">
      <label for="for_id_deis">Fecha Término</label>
      <input type="date" class="form-control" name="end_date">
  </fieldset>
</div>

<!-- <div class="row">
  <fieldset class="form-group col col-md">
      <label for="for_id_deis">Trabajador</label>
      <input type="text" class="form-control" id="search" name="" value="">
      <input type="hidden" name="user_id" id="user_id" value="">
  </fieldset>
</div> -->



@livewire('medical_programmer.select-med-prog-employee',['type'         => $request->type,
                                                         'specialty_id' => $request->specialty_id,
                                                         'profession_id'=> $request->profession_id,
                                                         'user_id'      => $request->user_id,
                                                         'contract_enable' => 1,
                                                         'required_enabled' => 1])

<div class="row">
  <fieldset class="form-group col col-md">
      <label for="for_id_deis">Observación</label>
      <textarea name="observation" class="form-control" rows="3" cols="80"></textarea>
  </fieldset>
</div>

<button type="submit" class="btn btn-primary">Crear</button>

</form>

@endsection

@section('custom_js')

<!-- <script src='{{asset('js/jquery-ui.min.js')}}'></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">

<script>

$('#search').autocomplete({
   source: function(request, response){
   $.ajax({
           url: "{{route('user.search_by_name')}}",
           dataType: 'json',
           async: false,
           data: {
             term: request.term
           },
           success: function(data){
             response(data)
           }
   });
 },
  select: function(event, ui) {
     $("#user_id").val(ui.item.id);

     // var textArea = document.getElementById('user_id');
     // textArea.dispatchEvent(new Event('input'));
  }
});

</script> -->

@endsection
