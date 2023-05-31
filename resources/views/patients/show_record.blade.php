@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #f2f2f2; text-align: center;">
            <h4 style="margin: 0;">Ficha de Paciente {{ $patient->OfficialFullName ?? '' }}</h4>
        </div>
        <div class="card-body">
            <h5>Datos de Paciente</h5>
            <hr>
            <div>
                @if ($patient->identifierRun)
                    <p>Run: {{ $patient ? $patient->identifierRun->value . '-' . $patient->identifierRun->dv : '' }}</p>
                @else
                    <p>Indentificación: {{ $patient->Identification->value ?? '' }}</p>
                @endif
                <p>Nombre Completo: {{ $patient->OfficialFullName ?? '' }}</p>
                <p>Dirección: {{ $patient->officialFullAddress ?? '' }}</p>
                <p>Sexo: {{ $patient->actualSex ?? '' }}</p>
                <p>Edad: {{ $patient->ageString ?? '' }}</p>
                @if ($patient->officialPhone)
                    <p>Fono: {{ $patient->officialPhone }}</p>
                @endif
                @if ($patient->officialEmail)
                    <p>Email: {{ $patient->officialEmail }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
