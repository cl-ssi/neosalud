<div class="modal fade" id="deleteModal{{ $suspectcase->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" action="{{ route('epi.chagas.destroy', $suspectcase) }}">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Borrar Solicitud</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Ingreso Motivo Borrado Solicitud de muestra:</h6>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="for_name">Usuario que el borrado de solicitud (Usuario
                                        Logeado):</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->OfficialFullName ?? '' }}"
                                        style="text-transform: uppercase;" readonly>
                                </fieldset>
                            </div>

                            <br>
                            <div class="row">
                                <fieldset class="form-group col-md-3">
                                    <label for="for_delete_reason">Motivo de Borrado*</label>
                                    <select class="form-select" name="delete_reason" id="for_delete_reason" required>
                                        <option value="">Seleccionar Opción</option>
                                        <option value="Traslado">Traslado</option>
                                        <option value="Rechaza Toma de Muestra">Rechaza Toma de Muestra</option>
                                        <option value="Inubicable">Inubicable</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
