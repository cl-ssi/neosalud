<div>
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
                <button type="button" class="btn btn-secondary mb-2 float-start" wire:click="clean">Limpiar</button>
                <button type="submit" class="btn btn-primary mb-2 float-end"><i class="fa fa-search"></i>
                    Buscar</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">Nombre:</th>
                    <th scope="col">Organizaciones:</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Selec.</th>

            </thead>
            <tbody>
                @if ($patients)
                    @forelse($patients as $patient)
                        <tr>
                            <td>{{ $patient ? $patient->officialFullName : '' }}</td>
                            <td>
                                @if ($patient->practitioners)
                                    <ul>
                                        @foreach ($patient->practitioners as $practitioner)
                                            <li>{{ $practitioner->organization->alias ?? 'Organización no posee alias' }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>{{ $patient ? $patient->identifierRun->value . '-' . $patient->identifierRun->dv : '' }}
                            </td>
                            <td>{{ $patient ? $patient->ageString : '' }}</td>
                            <td>{{ $patient ? $patient->actualSex : '' }}</td>
                            <td>{{ $patient ? $patient->officialFullAddress : '' }}</td>
                            <td>{{ $patient ? $patient->officialPhone : '' }}</td>
                            <td>{{ $patient && $patient->officialEmail ? $patient->officialEmail : '' }}</td>
                            <td nowrap>
                                <a class="btn btn-primary btn-sm mr-1" title="Editar"
                                    href="{{ route('user.edit', $patient->id) }}"><span class="fas fa-edit"
                                        aria-hidden="true"></span></a>
                                @can('be god')
                                    <a class="btn btn-warning btn-sm" title="Cambiar a usuario"
                                        href="{{ route('user.switch', $patient->id) }}"><span class="fas fa-redo"
                                            aria-hidden="true"></span></a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="8" class="text-center">No hay coincidencias con la búsqueda
                                <a class="btn-primary btn-sm" href="{{ route('user.create') }}"><i
                                        class="fas fa-user-plus"></i> Ingresar nuevo usuario</a></td>
                            </th>
                    @endforelse
                    @if ($patients->count() > 0)
                        <tr>
                            <th scope="row" colspan="8" class="text-center">Si ninguno en la búsqueda corresponde
                                al usuario que estas buscando <a class="btn btn-primary btn-sm"
                                    href="{{ route('user.create') }}"> <i class="fas fa-user-plus"></i> Ingresar nuevo
                                    usuario</a></td>
                            </th>
                    @endif
                @endif
            </tbody>
        </table>
    </div>
</div>
