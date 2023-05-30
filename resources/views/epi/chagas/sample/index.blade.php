@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas Pendiente de Toma de Muestra de
        {{ $organization->alias ?? '' }}</h4>

    <div class="table-responsive">
        <table class="table table-sm table-bordered" id="tabla_casos">
            <thead>
                <tr>
                    <th nowrap>ID</th>
                    <th>Grupo de Pesquisa</th>
                    <th>Organización</th>
                    <th>Nombre Paciente</th>
                    <th>RUN o Identificación</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Nacionalidad</th>
                    <th>Observacion</th>
                    <th>Solicitado por</th>
                    <th>Fecha de Solicitud</th>
                    <th>Tomar muestra</th>
                </tr>
            </thead>
            <tbody id="tableCases">
                @foreach ($suspectcases as $suspectcase)
                    <tr>
                        <td>{{ $suspectcase->id ?? '' }}</td>
                        <td>{{ $suspectcase->research_group ?? '' }}</td>
                        <td>{{ $organization->alias ?? '' }} </td>
                        <td>{{ $suspectcase->patient->OfficialFullName ?? '' }}
                            @if ($suspectcase->research_group == 'Gestante (+semana gestacional)')
                                <img align="center" src="{{ asset('images/pregnant.png') }}" width="24">
                            @endif
                        </td>
                        <td>
                            @if ($suspectcase->patient->identifierRun)
                                {{ $suspectcase->patient->identifierRun->value ?? '' }}-{{ $suspectcase->patient->identifierRun->dv }}
                            @else
                                {{ $suspectcase->patient->Identification->value ?? '' }}
                            @endif
                        </td>
                        <td>
                            {{ $suspectcase->patient->AgeString ?? '' }}
                        </td>
                        <td>{{ $suspectcase->patient->actualSex()->text ?? '' }}</td>
                        <td>{{ $suspectcase->patient->nationality->name ?? '' }}</td>
                        <td>{{ $suspectcase->observation ?? '' }}</td>
                        <td>{{ $suspectcase->requester->OfficialFullName ?? '' }}</td>
                        <td>{{ $suspectcase->request_at ?? '' }}</td>
                        <td>
                            <button class="virus-button btn btn-link" type="button" data-case-id="{{ $suspectcase->id }}">
                                <i class="fa-solid fa-vial-virus"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $suspectcases->appends(request()->query())->links() }}
    </div>

    <div id="popup"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;">
        <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px;">
            <h3>Formulario de Toma de muestra</h3>
            <p>Fecha y Hora actual: <span id="current-date"></span></p>
            <p>Usuario logueado: <span id="logged-user"></span></p>
            <form id="sample-form" action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <button type="button" onclick="closePopup()" class="btn btn-secondary">Cancelar</button>
            </form>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        const virusButtons = document.querySelectorAll('.virus-button');

        virusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const caseId = this.getAttribute('data-case-id');

                // Set the form action dynamically based on the case ID
                const form = document.getElementById('sample-form');
                form.action = "{{ url('chagas/sample-blood') }}/" + caseId;

                // Show the popup
                document.getElementById('popup').style.display = 'block';

                // Get the current date
                const currentDate = new Date();
                const formattedDateTime = currentDate.toLocaleString();
                document.getElementById('current-date').innerText = formattedDateTime;
                

                // Get the logged user
                const loggedUser = "{{ auth()->user()->OfficialFullName }}";
                document.getElementById('logged-user').innerText = loggedUser;
            });
        });


        // Function to close the popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
@endsection
