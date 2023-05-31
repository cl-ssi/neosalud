<div>

    @if ($confirmOrganization && $selectedOrganization)
        <div class="alert alert-warning mt-2" role="alert">
            ¿Está seguro que desea solicitar un examen de Chagas para
            @if ($selectedPatient)
                {{ $selectedPatient->officialFullName }}
            @endif
            de la organización {{ $selectedOrganization->alias }}?
            <button type="button" class="btn btn-primary btn-sm ml-2" wire:click.prevent="confirmOrganizationAction">
                Confirmar
            </button>
            <button type="button" class="btn btn-secondary btn-sm ml-2" wire:click.prevent="cancelOrganizationAction">
                Cancelar
            </button>
        </div>
    @endif



    <form wire:submit.prevent="search">
        <div class="row g-2">
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Autenticación sin digito verificador"
                    wire:model.lazy="searchByIdentifier" autocomplete="off">
            </div>
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" placeholder="Nombre y/o apellido"
                    wire:model.lazy="searchByHumanName" autocomplete="off">
            </div>
            <div class="col-6 col-md-6">
                <input type="text" class="form-control" placeholder="Domicilio" wire:model.lazy="searchByAddress"
                    autocomplete="off">
            </div>
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" placeholder="Teléfono, celular o e-mail"
                    wire:model.lazy="searchByContactPoint" autocomplete="off">
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-secondary mb-2 float-left" wire:click="clean">Limpiar</button>
                <button type="submit" class="btn btn-primary mb-2 float-right"><i class="fa fa-search"></i>
                    Buscar</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">Nombre:</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Editar.</th>
                    <!-- Mostrar campo "Solicitar Examen" solo si el modo es "solicitante" -->
                    @if ($mode === 'Solicitante')
                        <th scope="col">Solicitar Examen.</th>
                    @endif

                    @if ($mode === 'Contacto')
                        <th scope="col">Contacto.</th>
                    @endif


                    @if ($mode === 'Ficha')
                        <th scope="col">Ficha Paciente.</th>
                    @endif


            </thead>
            <tbody>
                @if ($patients)
                    @forelse($patients as $patient)
                        <tr>
                            <td @if ($selectedPatientId == $patient->id) class="bg-primary text-white" @endif>
                                {{ $patient ? $patient->officialFullName : '' }}
                            </td>
                            <td>{{ $patient ? $patient->Identification->value : '' }}
                                {{ $patient->IdentifierRun ? '-' . $patient->identifierRun->dv : '' }}
                            </td>
                            <td>{{ $patient ? $patient->ageString : '' }}</td>
                            <td>{{ $patient ? $patient->actualSex : '' }}</td>
                            <td>{{ $patient ? $patient->officialFullAddress : '' }}</td>
                            <td>{{ $patient ? $patient->officialPhone : '' }}</td>
                            <td>{{ $patient && $patient->officialEmail ? $patient->officialEmail : '' }}</td>
                            <td><a class="btn-primary btn-sm" href="{{ route('patient.edit', $patient->id) }}"
                                    title="Editar"> <i class="fas fa-edit"></i> </a></td>
                            <!-- Mostrar el dropbox de organizacion solo si el modo es "solicitante" -->
                            @if ($mode === 'Solicitante')
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Seleccionar organización
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($organizations as $organization)
                                                <li>
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="selectOrganization('{{ $organization->id }}', '{{ $patient->id }}')">
                                                        {{ $organization->alias }}
                                                    </a>

                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </td>
                            @endif

                            <!-- Mostrar un modal solo si es modo "Contacto" -->
                            @if ($mode === 'Contacto')
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $patient->id }}">
                                        <i class="fas fa-people-arrows"></i>
                                    </a>

                                    @include('patients.modals.create_contact')
                                </td>
                            @endif

                            <!-- Mostrar la ficha del Paciente solo si es modo "Ficha" -->
                            @if ($mode === 'Ficha')
                                @if ($patient->suspectCases()->count() > 0)
                                    <td>
                                        <a class="btn-primary btn-sm"
                                            href="{{ route('patient.showRecord', $patient->id) }}"
                                            title="Ficha Médica"> <i class="fas fa-file-medical"></i> </a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="8" class="text-center">No hay coincidencias con la búsqueda
                                <a class="btn-primary btn-sm" href="{{ route('patient.create') }}"> <i
                                        class="fas fa-user-plus"></i> Ingresar nuevo paciente</a></td>
                            </th>
                    @endforelse
                    @if ($patients->count() > 0)
                        <tr>
                            <th scope="row" colspan="8" class="text-center">Si ninguno en la búsqueda corresponde
                                al paciente que estas buscando <a class="btn-primary btn-sm"
                                    href="{{ route('patient.create') }}"> <i class="fas fa-user-plus"></i> Ingresar
                                    nuevo paciente</a></td>
                            </th>
                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>
