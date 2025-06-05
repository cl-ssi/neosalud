<div>
    @include('samu.nav')

    <h4 class="mb-3 mt-3">Novedades</h4>
    
    <div class="row mb-3">
        <div class="col-md-8">
            <div class="input-group">
                <input type="text" class="form-control" wire:model.defer='search' placeholder="Buscar en detalle...">
                {{-- wire:model.lazy para que el render se ejecute al perder el foco --}}
                <input type="date" class="form-control" wire:model.lazy='date'> 
                <button class="btn btn-outline-secondary" wire:click='render' type="button">Buscar</button>
            </div>
        </div>
        <div class="col-md-4 text-end">
            @if($openShift)
            <a href="{{ route('samu.noveltie.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus"></i>
                Crear Novedad
            </a>
            @endif
            {{-- BOTÓN PARA ABRIR EL MODAL DE PDF --}}
            <button wire:click="openPdfModal" class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Exportar PDF
            </button>
        </div>
    </div>

    {{-- Mostrar mensaje de error si existe (para el modal) --}}
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @include('samu.noveltie.partials.list', ['novelties' => $novelties ])

    {{ $novelties->links() }}

    {{-- MODAL PARA EXPORTAR PDF --}}
    @if($showPdfModal)
    <div class="modal fade show" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Exportar Novedades a PDF</h5>
                    <button type="button" class="btn-close" wire:click="closePdfModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pdfDate" class="form-label">Fecha:</label>
                        <input type="date" id="pdfDate" class="form-control" wire:model.defer="pdfDate">
                        @error('pdfDate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pdfPeriod" class="form-label">Período:</label>
                        <select id="pdfPeriod" class="form-select" wire:model.defer="pdfPeriod">
                            <option value="all">Todos (Mañana, Tarde y Noche)</option>
                            <option value="morning">Solo Mañana (00:00 - 11:59)</option>
                            <option value="afternoon">Solo Tarde (12:00 - 19:59)</option>
                            <option value="night">Solo Noche (20:00 - 23:59)</option>
                        </select>
                        @error('pdfPeriod') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closePdfModal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="exportSelectedPdf" wire:loading.attr="disabled">
                        <span wire:loading wire:target="exportSelectedPdf" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Generar PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>