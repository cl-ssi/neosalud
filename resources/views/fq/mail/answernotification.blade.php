@extends('layouts.mail')

@section('content')

<div style="text-align: justify;">

    <h4>Estimado/a Usuario: </h4>

    <br>

    @if($fqRequest->name == 'specialty hours' && $fqRequest->attention == 'teleconsultation')

        <p>Por medio de este correo, se informa citación vía telemedicina para el día {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}
            con el profesional {{ $fqRequest->practitioner->user->officialFullName }}, vía zoom. Para ingresar a tu consulta debes
            ingresar al siguiente enlace: <a href="{{ $fqRequest->link }}">{{ $fqRequest->link }}</a></p>

        <br>

        <p>Recomendaciones para el día de tu cita:</p>

        <ul>
            <li>Recomendamos que te conectes 10 minutos antes de la cita, para comprobar que tu cámara, micrófono y parlante funcione correctamente.</li>
            <li>Idealmente usar un computador para realizar la video llamada, sin embargo, también se puede realizar desde dispositivos móviles como tablets o celulares.</li>
            <li>Contar con una buena y estable conexión a internet.</li>
            <li>Escoger un lugar tranquilo y sin ruido.</li>
            <li>En la plataforma de atención, podrás adjuntar archivos, tales como exámenes, recetas o cualquier otro documento que sea importante y necesario para la evaluación del médico.</li>
        </ul>

        <!-- <p>Si presentas algún inconveniente en la conexión, favor escribe a mail <strong>fq.iquique@redsalud.gob.cl</strong></p> -->
        <br>

        <p><strong>Equipo Telemedicina<br>
           <strong>Hospital Dr. Ernesto Torres G.<br>
           <strong>Servicio de Salud Tarapacá
        </p>

    @endif

    @if($fqRequest->name == 'specialty hours' && $fqRequest->attention ==  'face-to-face')

        <p>Por medio de este correo, se informa citación presencial:</p>

        <ul>
            <li><strong>Día y Hora</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</li>
            <li><strong>Profesional</strong>: {{ $fqRequest->practitioner->user->officialFullName }}</li>
            <hr>
            <li><strong>Paciente</strong>: {{ $fqRequest->patient->officialFullName }}</li>
            <li><strong>Rut</strong>: {{ $fqRequest->patient->IdentifierRun->value }}-{{ $fqRequest->patient->IdentifierRun->dv }}</li>
            @if($fqRequest->name == 'specialty hours' && $fqRequest->specialties == 'other')
            <li><strong>Especialidad</strong>: {{ $fqRequest->SpecialtiesValue }} / {{ $fqRequest->OtherSpecialtiesValue }}</li>
            @else
            <li><strong>Especialidad</strong>: {{ $fqRequest->SpecialtiesValue }}</li>
            @endif
            <li><strong>Observación</strong>: {{ $fqRequest->observation_request }}</li>

            <li><strong>Lugar</strong>: {{ $fqRequest->place }}</li>
            <li><strong>Valor a pagar</strong>: ${{ number_format($fqRequest->value, 0, ',','.') }}</li>
        </ul>
    @endif

    @if($fqRequest->name == 'dispensing')

    <p>Por medio de este correo, se informa que su receta está siendo preparada
      por personal de farmacia central, nos pondremos en contacto con usted para
      coordinar la entrega sus medicamentos en domicilio.</p>

    <ul>
        <li><strong>Fecha / Hora estimada entrega</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</li>
        <li><strong>Observación sobre entrega</strong>: {{ $fqRequest->observation_request }}</li>
    </ul>

    <br>

    <p>Recomendaciones:</p>

    <ul>
        <li>Recuerde administrar los medicamentos según las pautas indicadas por
            el médico en su receta.</li>
        <li>Procure almacenar sus medicamentos e insumos en lugares frescos y secos.</li>
        <li>En caso de presentar alguna reacción adversa por el uso de sus medicamentos
          o dispositivos médicos, recuerde informar inmediatamente a un profesional de la salud.</li>
        <li>Recuerde solicitar su próxima receta con anticipación para gestionar oportunamente.</li>
    </ul>

    <br>

    <p><strong>Equipo de Farmacia<br>
       <strong>Hospital Dr. Ernesto Torres T.<br>
       <strong>Servicio de Salud Tarapacá
    </p>

    @endif

    @if($fqRequest->name =='home hospitalization')
    <p>Por medio de este mail, se informa respuesta a su solicitud de <strong>{{ $fqRequest->NameValue }}</strong>:</p>

    <ul>
        <li><strong>Día y Hora</strong>: {{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</li>
        <li><strong>Observación</strong>: {{ $fqRequest->observation_request }}</li>
    </ul>
    @endif


</div>
@endsection
