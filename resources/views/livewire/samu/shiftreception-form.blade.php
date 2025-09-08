<div>
    @include('samu.nav')
    <div class="container mt-4">

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ $isEditing ? 'Editar Turno' : 'Crear Nuevo Turno' }}</h2>
            <button type="button" class="btn btn-secondary" wire:click="cancel">
                <i class="fas fa-arrow-left"></i> Volver
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <ul class="nav nav-tabs" id="shiftReceptionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('encabezado')}}" id="encabezado-tab" wire:click="changeTab('encabezado')" type="button">
                                <i class="fas fa-header"></i> Encabezado
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('centro-regulador')}}" id="centro-regulador-tab" wire:click="changeTab('centro-regulador')" type="button">
                                <i class="fas fa-headset"></i> Centro Regulador
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('ausencias')}}" id="ausencias-tab" wire:click="changeTab('ausencias')" type="button">
                                <i class="fas fa-user-times"></i> Ausencias
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('tarjetas')}}" id="tarjetas-tab" wire:click="changeTab('tarjetas')" type="button">
                                <i class="fas fa-credit-card"></i> Tarjetas
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('radios')}}" id="radios-tab" wire:click="changeTab('radios')" type="button">
                                <i class="fas fa-broadcast-tower"></i> Radios
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('moviles')}}" id="moviles-tab" wire:click="changeTab('moviles')" type="button">
                                <i class="fas fa-truck-medical"></i> Móviles
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('combustible')}}" id="combustible-tab" wire:click="changeTab('combustible')" type="button">
                                <i class="fas fa-gas-pump"></i> Combustible
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('equipos')}}" id="equipos-tab" wire:click="changeTab('equipos')" type="button">
                                <i class="fas fa-toolbox"></i> Equipos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('oxigeno')}}" id="oxigeno-tab" wire:click="changeTab('oxigeno')" type="button">
                                <i class="fas fa-wind"></i> Oxígeno
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('novedades')}}" id="novedades-tab" wire:click="changeTab('novedades')" type="button">
                                <i class="fas fa-exclamation-circle"></i> Novedades
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{$this->isActive('traslados')}}" id="traslados-tab" wire:click="changeTab('traslados')" type="button">
                                <i class="fas fa-ambulance"></i> Traslados
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="shiftReceptionTabsContent">
                        <!-- Encabezado -->
                        <div class="tab-pane fade {{$this->isActive('encabezado')}}" id="encabezado">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Fecha <span class="text-danger">*</span></label>
                                    <input type="date" wire:model="date" class="form-control" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Jornada <span class="text-danger">*</span></label>
                                    <select wire:model="shift" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="morning">Mañana</option>
                                        <option value="afternoon">Tarde</option>
                                        <option value="night">Noche</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Jefe de Turno <span class="text-danger">*</span></label>
                                    <input type="text" wire:model="shift_leader" class="form-control" required>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Llave de Sala <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="room_key" value="1" id="llave_si">
                                        <label class="form-check-label" for="llave_si">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="room_key" value="0" id="llave_no">
                                        <label class="form-check-label" for="llave_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Centro Regulador -->
                        <div class="tab-pane fade {{$this->isActive('centro-regulador')}}" id="centro-regulador">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Centro Regulador Médico</label>
                                    <input type="text" wire:model="medical_regulator" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Centro Regulador Enfermero</label>
                                    <input type="text" wire:model="nursing_regulator" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Centro Regulador Despachador</label>
                                    <input type="text" wire:model="dispatcher_regulator" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Centro Regulador Operadores</label>
                                    <input type="text" wire:model="operators_regulator" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Entrega</label>
                                    <input type="text" wire:model="handover" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Recibe</label>
                                    <input type="text" wire:model="receive" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Firma</label>
                                    <input type="text" wire:model="signature" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Ausencias -->
                        <div class="tab-pane fade {{$this->isActive('ausencias')}}" id="ausencias">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Funcionario</th>
                                            <th>Motivo</th>
                                            <th>Días Ausencia</th>
                                            <th>Reemplaza</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($absences as $index => $absence)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="absences.{{ $index }}.staff" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="absences.{{ $index }}.reason" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" wire:model="absences.{{ $index }}.absence_days" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="absences.{{ $index }}.replacement" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('absences', {{ $index }})"
                                                    @if(count($absences) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('absences')">
                                    <i class="fas fa-plus"></i> Agregar Ausencia
                                </button>
                            </div>
                        </div>

                        <!-- Tarjetas -->
                        <div class="tab-pane fade {{$this->isActive('tarjetas')}}" id="tarjetas">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Móvil</th>
                                            <th>Tarj. Combustible</th>
                                            <th>Móvil 2</th>
                                            <th>Tarjeta Baño</th>
                                            <th>Lanyard HAH1</th>
                                            <th>Lanyard Azul2</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cards as $index => $card)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.vehicle" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.fuel_card" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.vehicle2" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.bathroom_card" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.lanyard_hah1" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="cards.{{ $index }}.lanyard_blue2" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('cards', {{ $index }})"
                                                    @if(count($cards) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('cards')">
                                    <i class="fas fa-plus"></i> Agregar Tarjeta
                                </button>
                            </div>
                        </div>

                        <!-- Radios -->
                        <div class="tab-pane fade {{$this->isActive('radios')}}" id="radios">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Número Radio</th>
                                            <th>Personal</th>
                                            <th>Móvil</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($radio_loans as $index => $radio)
                                        <tr>
                                            <td>
                                                <input type="number" wire:model="radio_loans.{{ $index }}.radio_number" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="radio_loans.{{ $index }}.personnel" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="radio_loans.{{ $index }}.vehicle" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('radio_loans', {{ $index }})"
                                                    @if(count($radio_loans) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('radio_loans')">
                                    <i class="fas fa-plus"></i> Agregar Préstamo Radio
                                </button>
                            </div>
                        </div>

                        <!-- Móviles -->
                        <div class="tab-pane fade {{$this->isActive('moviles')}}" id="moviles">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Móvil</th>
                                            <th>Tipo</th>
                                            <th>Conductor</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vehicles as $index => $vehicle)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="vehicles.{{ $index }}.vehicle" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="vehicles.{{ $index }}.type" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="vehicles.{{ $index }}.driver" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('vehicles', {{ $index }})"
                                                    @if(count($vehicles) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('vehicles')">
                                    <i class="fas fa-plus"></i> Agregar Móvil
                                </button>
                            </div>
                        </div>

                        <!-- Combustible -->
                        <div class="tab-pane fade {{$this->isActive('combustible')}}" id="combustible">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Móvil</th>
                                            <th>Estado Combustible</th>
                                            <th>Estado O2</th>
                                            <th>Recarga</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fuel_status as $index => $fuel)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="fuel_status.{{ $index }}.vehicle" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="fuel_status.{{ $index }}.fuel_status" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="fuel_status.{{ $index }}.o2_status" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="fuel_status.{{ $index }}.refill" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('fuel_status', {{ $index }})"
                                                    @if(count($fuel_status) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('fuel_status')">
                                    <i class="fas fa-plus"></i> Agregar Estado Combustible
                                </button>
                            </div>
                        </div>

                        <!-- Equipos -->
                        <div class="tab-pane fade {{$this->isActive('equipos')}}" id="equipos">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Equipo</th>
                                            <th>Servicio</th>
                                            <th>Responsable</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($equipment_loans as $index => $equipment)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="equipment_loans.{{ $index }}.equipment" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="equipment_loans.{{ $index }}.service" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="equipment_loans.{{ $index }}.responsible" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('equipment_loans', {{ $index }})"
                                                    @if(count($equipment_loans) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('equipment_loans')">
                                    <i class="fas fa-plus"></i> Agregar Préstamo Equipo
                                </button>
                            </div>
                        </div>

                        <!-- Oxígeno -->
                        <div class="tab-pane fade  {{$this->isActive('oxigeno')}}" id="oxigeno">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Cantidad Cilindros</th>
                                            <th>Llenos</th>
                                            <th>Vacios</th>
                                            <th>Recarga</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($portable_oxygen as $index => $oxygen)
                                        <tr>
                                            <td>
                                                <input type="number" wire:model="portable_oxygen.{{ $index }}.cylinder_quantity" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" wire:model="portable_oxygen.{{ $index }}.full" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" wire:model="portable_oxygen.{{ $index }}.empty" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" wire:model="portable_oxygen.{{ $index }}.refill" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('portable_oxygen', {{ $index }})"
                                                    @if(count($portable_oxygen) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('portable_oxygen')">
                                    <i class="fas fa-plus"></i> Agregar Oxígeno Portátil
                                </button>
                            </div>
                        </div>

                        <!-- Novedades -->
                        <div class="tab-pane fade {{$this->isActive('novedades')}}" id="novedades">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Novedad</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($novelties as $index => $novelty)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="novelties.{{ $index }}.novelty" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('novelties', {{ $index }})"
                                                    @if(count($novelties) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('novelties')">
                                    <i class="fas fa-plus"></i> Agregar Novedad
                                </button>
                            </div>
                        </div>

                        <!-- Traslados -->
                        <div class="tab-pane fade {{$this->isActive('traslados')}}" id="traslados">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Detalle</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($secondary_transfers as $index => $transfer)
                                        <tr>
                                            <td>
                                                <input type="text" wire:model="secondary_transfers.{{ $index }}.detail" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="removeRow('secondary_transfers', {{ $index }})"
                                                    @if(count($secondary_transfers) <=1) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-outline-primary" wire:click="addRow('secondary_transfers')">
                                    <i class="fas fa-plus"></i> Agregar Traslado Secundario
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" wire:click="cancel">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ $isEditing ? 'Actualizar' : 'Guardar' }} Turno
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>