<div>
    @include('samu.nav')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Turnos de Enfermería</h2>
            <a href="{{ route('samu.shiftreception.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Nuevo Turno
            </a>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Jornada</th>
                                <th>Jefe de Turno</th>
                                <th>Llave Sala</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($shifts as $shift)
                            <tr>
                                <td>{{ $shift->date->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ ucfirst($shift->shift) }}</span>
                                </td>
                                <td>{{ $shift->shift_leader }}</td>
                                <td>
                                    @if(!is_null($shift->room_key))
                                    <span class="badge bg-success">{{$shift->room_key?'Si':'No';}}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a wire:click="showShiftModal({{$shift->id}})" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('samu.shiftreception.edit', $shift) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            wire:click="delete({{ $shift->id }})"
                                            wire:confirm="¿Está seguro de eliminar este turno?">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay turnos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $shifts->links() }}
                </div>
            </div>
        </div>
        @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalle del Turno</h5>
                        <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        @if($selectedShift)
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Fecha:</strong>
                                <p>{{ $selectedShift->date->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-md-3">
                                <strong>Jornada:</strong>
                                <p>
                                    <span class="badge bg-primary">{{ ucfirst($selectedShift->shift) }}</span>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <strong>Jefe de Turno:</strong>
                                <p>{{ $selectedShift->shift_leader }}</p>
                            </div>
                            <div class="col-md-3">
                                <strong>Llave de Sala:</strong>
                                <p>
                                    @if($selectedShift->room_key)
                                    <span class="badge bg-success">Sí</span>
                                    @else
                                    <span class="badge bg-danger">No</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="fas fa-headset"></i> Centro Regulador</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Médico:</strong> {{ $selectedShift->medical_regulator ?? 'N/A' }}</li>
                                    <li><strong>Enfermero:</strong> {{ $selectedShift->nursing_regulator ?? 'N/A' }}</li>
                                    <li><strong>Despachador:</strong> {{ $selectedShift->dispatcher_regulator ?? 'N/A' }}</li>
                                    <li><strong>Operadores:</strong> {{ $selectedShift->operators_regulator ?? 'N/A' }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-exchange-alt"></i> Entrega/Recibe</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Entrega:</strong> {{ $selectedShift->handover ?? 'N/A' }}</li>
                                    <li><strong>Recibe:</strong> {{ $selectedShift->receive ?? 'N/A' }}</li>
                                    <li><strong>Firma:</strong> {{ $selectedShift->signature ?? 'N/A' }}</li>
                                </ul>
                            </div>
                        </div>

                        <hr>

                        @if(!empty($selectedShift->absences))
                        <div class="mb-4">
                            <h5><i class="fas fa-user-times"></i> Ausencias</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Funcionario</th>
                                            <th>Motivo</th>
                                            <th>Días</th>
                                            <th>Reemplaza</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($selectedShift->absences as $absence)
                                        <tr>
                                            <td>{{ $absence['staff'] ?? '' }}</td>
                                            <td>{{ $absence['reason'] ?? '' }}</td>
                                            <td>{{ $absence['absence_days'] ?? '' }}</td>
                                            <td>{{ $absence['replacement'] ?? '' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if(!empty($selectedShift->novelties))
                        <div class="mb-4">
                            <h5><i class="fas fa-exclamation-circle"></i> Novedades</h5>
                            <ul>
                                @foreach($selectedShift->novelties as $novelty)
                                <li>{{ $novelty['novelty'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(!empty($selectedShift->secondary_transfers))
                        <div class="mb-4">
                            <h5><i class="fas fa-ambulance"></i> Traslados Secundarios</h5>
                            <ul>
                                @foreach($selectedShift->secondary_transfers as $transfer)
                                <li>{{ $transfer['detail'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>