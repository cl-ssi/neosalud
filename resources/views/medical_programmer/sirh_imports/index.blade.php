@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@include('medical_programmer.nav')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Importar archivo SIRH</h3>

<div class="alert alert-info">
    <strong>Formato requerido para el archivo SIRH:</strong><br>
    El archivo debe ser Excel (.xlsx) y contener las siguientes columnas:<br>
    <ul>
        <li><b>rut_programable</b>: RUT del usuario (sin puntos, con guion)</li>
        <li><b>dv</b>: Dígito verificador</li>
        <li><b>nombre</b>: Nombre completo (separado por espacios: apellido paterno, materno, nombres)</li>
        <li><b>id_deis</b>: Código DEIS del establecimiento</li>
        <li><b>ausentismo_sino</b>: Si/No</li>
        <li><b>motivo_maternales_psgs_comisiones_de_estudio</b>: Motivo de ausentismo</li>
        <li><b>titulo_profesional_desempeno</b>: Título profesional</li>
        <li><b>especialidad_sis</b>: Especialidad SIS</li>
        <li><b>correlativo_contrato</b>: ID de contrato</li>
        <li><b>ley</b>: Ley del contrato (19664, 18834, 15076, Honorarios)</li>
        <li><b>sistema_de_turno_sino</b>: Si/No</li>
        <li><b>hrs_semanales_contratadas</b>: Horas semanales contratadas</li>
        <li><b>horas_efectivas_al_centro</b>: Horas efectivas al centro</li>
        <li><b>tiempo_de_colacion_semanal_min</b>: Minutos de colación semanal</li>
        <li><b>tiempo_de_permiso_gremial_semanal_min</b>: Minutos de permiso gremial semanal</li>
        <li><b>tiempo_de_lactancia_semanal_min</b>: Minutos de lactancia semanal</li>
        <li><b>observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca</b>: Observaciones</li>
        <li><b>feriados_legales</b>: Días de feriado legal</li>
        <li><b>dias_descanso_compensatorio_ley_urgencia</b>: Días de descanso compensatorio</li>
        <li><b>dias_de_permisos_administrativos</b>: Días de permisos administrativos</li>
        <li><b>descanso_reparatorio_covid</b>: Días de descanso COVID</li>
        <li><b>dias_de_congreso_o_capacitacion</b>: Días de capacitación</li>
        <li><b>fecha_inicio_contrato_ddmmaaaa</b>: Fecha inicio contrato (Excel date)</li>
        <li><b>fecha_termino_contrato_ddmmaaaa</b>: Fecha término contrato (Excel date)</li>
        <li><b>fecha_alejamiento_ddmmaaaa</b>: Fecha alejamiento (Excel date, opcional)</li>
    </ul>
    <b>Nota:</b> Todos los campos son obligatorios salvo <b>fecha_alejamiento_ddmmaaaa</b>.<br>
    Puedes descargar un archivo de ejemplo para importar correctamente:
    <a href="{{ route('medical_programmer.rrhh.downloadExampleSirhFile') }}" class="btn btn-info btn-sm ml-2">Descargar archivo de ejemplo</a>
</div>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.rrhh.importSirhFile') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')


    <div class="d-flex align-items-end gap-2 mb-4">
        <div class="form-group mb-0">
            <label for="sirhfile">Archivo</label>
            <input type="file" class="form-control" id="sirhfile" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary mb-0" style="height:40px;">Guardar</button>
    </div>

</form>

@endsection

@section('custom_js')
<script>

</script>
@endsection