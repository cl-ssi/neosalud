<div>
    @include('samu.nav')

    @include('layouts.partials.flash_message')

    <div class="row mb-2">
        <div class="col">
            <h4>Monitor de Pacientes</h4>
        </div>

        <div class="col text-end">
            <button
                wire:click="addToQueue"
                class="btn btn-sm btn-success"
                wire:loading.attr="disabled"
            >
                <span
                    wire:loading.remove
                    wire:target="addToQueue"
                >
                    <i class="fas fa-play"></i>
                </span>

                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    wire:loading
                    wire:target="addToQueue"
                    aria-hidden="true"
                >
                </span>
                Encolar 100
            </button>
            <button
                wire:click="getStadistic"
                class="btn btn-sm btn-primary"
                wire:loading.attr="disabled"
            >
                <span
                    wire:loading.remove
                    wire:target="getStadistic"
                >
                    <i class="fas fa-rotate"></i>
                </span>

                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    wire:loading
                    wire:target="getStadistic"
                    aria-hidden="true"
                >
                </span>
                Actualizar Estadística
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>
                        <h6>
                            <i class="fas fa-tasks text-primary"></i>
                            Total Pacientes con RUN Procesados
                        </h6>
                    </td>
                    <td class="text-center">
                        {{ $patientsProcessed }} de {{ $patientsWithRun }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <i class="fas fa-check-square text-success"></i>
                            Total Pacientes con RUN Corregidos
                        </h6>
                        <small>Corregidos y Procesados por la cola</small>
                    </td>
                    <td class="text-center">
                        {{ $patientsWithRunFixed }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <i class="fas fa-exclamation-triangle text-danger"></i>
                            Total Pacientes con RUN Erroneos
                        </h6>
                    </td>
                    <td class="text-center">
                        {{ $patientsWithRunNoFixed }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <i class="fas fa-spinner text-info"></i>
                            Total Pacientes con RUN Encolados
                        </h6>
                        <small>Encolados y pendientes por corregir</small>
                    </td>
                    <td class="text-center">
                        {{ $patientsWithRunQueue }}
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>
