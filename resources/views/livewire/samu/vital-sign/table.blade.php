<div>
    <!-- Encabezado de la sección -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Signos Vitales</h5>
        <button type="button" class="btn btn-sm btn-success" wire:click="openCreateModal">
            <i class="fas fa-plus me-1"></i> Agregar
        </button>
    </div>

    <!-- Tabla compacta con estilos mejorados -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped table-sm align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="text-center" style="width: 5%;">#</th>
                    <th scope="col" style="width: 20%;">Fecha y Hora</th>
                    <th scope="col" style="width: 15%;">F. Cardíaca</th>
                    <th scope="col" style="width: 20%;">Presión Arterial</th>
                    <th scope="col" style="width: 10%;">EVA</th>
                    <th scope="col" style="width: 10%;">CO₂</th>
                    <th scope="col" class="text-center" style="width: 20%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vitalSigns as $index => $vs)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ optional($vs['registered_at'])->format('d-m-Y H:i') ?? '-' }}</td>
                        <td>{{ $vs['fc'] ?? '-' }}</td>
                        <td>{{ $vs['pa'] ?? '-' }}</td>
                        <td>{{ $vs['eva'] ?? '-' }}</td>
                        <td>{{ $vs['co2'] ?? '-' }}</td>
                        <td class="text-center">
                            <button type="button"
                                    class="btn btn-sm btn-outline-primary me-1"
                                    title="Editar"
                                    wire:click="openEditModal({{ $index }})"
                                    @if($event && $event->status == false) disabled @endif>
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    wire:click="deleteVitalSign({{ $index }})"
                                    @if($event && $event->status == false) disabled @endif>
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4"><em>No hay registros de signos vitales</em></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal para crear/editar signo vital -->
    @if($showModal)
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" @if($showModal) style="background: rgba(0,0,0,0.5);" @endif>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <form wire:submit.prevent="saveVitalSign">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title mb-0">
                            @if($isEditMode) Editar Signo Vital @else Nuevo Signo Vital @endif
                        </h5>
                        <button type="button" class="btn-close" aria-label="Cerrar" wire:click="$set('showModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <!-- Sección 1: Fecha y signos básicos -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="registered_at" class="form-label fw-semibold">Fecha y Hora</label>
                                    <input type="datetime-local"
                                           id="registered_at"
                                           class="form-control form-control-sm @error('form.registered_at') is-invalid @enderror"
                                           wire:model.defer="form.registered_at">
                                    @error('form.registered_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="fc" class="form-label fw-semibold">Frec. Cardíaca</label>
                                    <input type="number"
                                           id="fc"
                                           class="form-control form-control-sm @error('form.fc') is-invalid @enderror"
                                           wire:model.defer="form.fc"
                                           min="0" max="300">
                                    @error('form.fc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="fr" class="form-label fw-semibold">Frec. Respiratoria</label>
                                    <input type="number"
                                           id="fr"
                                           class="form-control form-control-sm @error('form.fr') is-invalid @enderror"
                                           wire:model.defer="form.fr"
                                           min="0" max="100">
                                    @error('form.fr')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sección 2: Presión y metabolismo -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label for="pa" class="form-label fw-semibold">Presión Arterial (sys/diast)</label>
                                    <input type="text"
                                           id="pa"
                                           class="form-control form-control-sm @error('form.pa') is-invalid @enderror"
                                           wire:model.defer="form.pa"
                                           placeholder="e.g. 120/80">
                                    @error('form.pa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="pam" class="form-label fw-semibold">P.A. Media</label>
                                    <input type="number"
                                           id="pam"
                                           class="form-control form-control-sm @error('form.pam') is-invalid @enderror"
                                           wire:model.defer="form.pam"
                                           placeholder="e.g. 93">
                                    @error('form.pam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="gl" class="form-label fw-semibold">Glucosa (mg/dl)</label>
                                    <input type="number"
                                           id="gl"
                                           class="form-control form-control-sm @error('form.gl') is-invalid @enderror"
                                           wire:model.defer="form.gl"
                                           min="0" max="500">
                                    @error('form.gl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sección 3: Saturación de Oxígeno -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label for="soam" class="form-label fw-semibold">% Sat. Oxígeno Arterial</label>
                                    <input type="number"
                                           id="soam"
                                           class="form-control form-control-sm @error('form.soam') is-invalid @enderror"
                                           wire:model.defer="form.soam"
                                           min="0" max="100">
                                    @error('form.soam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="soap" class="form-label fw-semibold">% Sat. Oxígeno Venoso</label>
                                    <input type="number"
                                           id="soap"
                                           class="form-control form-control-sm @error('form.soap') is-invalid @enderror"
                                           wire:model.defer="form.soap"
                                           min="0" max="100">
                                    @error('form.soap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="hgt" class="form-label fw-semibold">HGT (mg/dl)</label>
                                    <input type="number"
                                           id="hgt"
                                           class="form-control form-control-sm @error('form.hgt') is-invalid @enderror"
                                           wire:model.defer="form.hgt"
                                           min="0" max="500">
                                    @error('form.hgt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sección 4: Otros signos básicos -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label for="fill_capillary" class="form-label fw-semibold">Relleno Capilar (seg)</label>
                                    <input type="number"
                                           id="fill_capillary"
                                           class="form-control form-control-sm @error('form.fill_capillary') is-invalid @enderror"
                                           wire:model.defer="form.fill_capillary"
                                           min="0" max="10">
                                    @error('form.fill_capillary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="t" class="form-label fw-semibold">Temperatura (°C)</label>
                                    <input type="number" step="0.1"
                                           id="t"
                                           class="form-control form-control-sm @error('form.t') is-invalid @enderror"
                                           wire:model.defer="form.t"
                                           min="0" max="50">
                                    @error('form.t')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="p" class="form-label fw-semibold">Peso (kg)</label>
                                    <input type="number" step="0.1"
                                           id="p"
                                           class="form-control form-control-sm @error('form.p') is-invalid @enderror"
                                           wire:model.defer="form.p"
                                           min="0" max="500">
                                    @error('form.p')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sección 5: Signos fetales y escalas -->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="lcf" class="form-label fw-semibold">L.C.F. (latidos/min)</label>
                                    <input type="number"
                                           id="lcf"
                                           class="form-control form-control-sm @error('form.lcf') is-invalid @enderror"
                                           wire:model.defer="form.lcf"
                                           min="0" max="300">
                                    @error('form.lcf')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="eva" class="form-label fw-semibold">EVA (0-10)</label>
                                    <input type="number"
                                           id="eva"
                                           class="form-control form-control-sm @error('form.eva') is-invalid @enderror"
                                           wire:model.defer="form.eva"
                                           min="0" max="10">
                                    @error('form.eva')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="co2" class="form-label fw-semibold">CO₂ (mmHg) 0-100</label>
                                    <input type="number"
                                           id="co2"
                                           class="form-control form-control-sm @error('form.co2') is-invalid @enderror"
                                           wire:model.defer="form.co2"
                                           min="0" max="100">
                                    @error('form.co2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-outline-secondary" wire:click="$set('showModal', false)">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            @if($isEditMode) Guardar cambios @else Guardar @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <!-- /Modal -->
</div>
