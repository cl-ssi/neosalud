@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Listado de Actividades</h3>

<a class="btn btn-primary mb-2" href="{{ route('medical_programmer.activities.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>
<a class="btn btn-outline-info mb-2" onclick="exportTableToExcel('tabla', 'Hoja 1')">
    <i class="fas fa-download"></i>
</a>


<form method="GET" class="form-horizontal" action="{{ route('medical_programmer.activities.index') }}">
  <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">Tipo</span>
      </div>
      <select name="type" id="for_type" class="form-control" onchange="this.form.submit()">
        <option value="" {{ $request->type == "Todas" ? 'selected' : '' }}>Todas</option>
        <option value="1" {{ $request->type == "1" ? 'selected' : '' }}>Médicas</option>
        <option value="2" {{ $request->type == "2" ? 'selected' : '' }}>No médicas</option>
      </select>
  </div>
</form>

<table class="table table-sm table-borderer table-responsive-xl" id="tabla">
    <thead>
        <tr>
            <th>id_actividad</th>
            <th>Actividad</th>
            <th>Proceso</th>
            <th>Actividad Madre</th>
            <th>Tipo de actividad</th>
            <th>Rendimiento</th>
            <th>Programable</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $activities as $activity )
        <tr>
            <td>{{ $activity->id_activity }}</td>
            <td>{{ $activity->activity_name }}</td>
            <td>@if($activity->process) {{ $activity->process->name }} @endif</td>
            <td>@if($activity->motherActivity){{ $activity->motherActivity->description }}@endif</td>
            <td>@if($activity->activityType){{ $activity->activityType->name }}@endif</td>
            <td>@if($activity->performance) R @else NR @endif</td>
            <td>@if($activity->programmable) Sí @else No @endif</td>
            <td>
      				<a href="{{ route('medical_programmer.activities.edit', $activity) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('medical_programmer.activities.destroy', $activity) }}" class="d-inline">
      					@csrf
      					@method('DELETE')
      					<button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
      						<span class="fas fa-trash-alt" aria-hidden="true"></span>
      					</button>
      				</form>
      			</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $activities->links('pagination::bootstrap-4') }}

@endsection

@section('custom_js')
<script type="text/javascript">
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
</script>
@endsection
