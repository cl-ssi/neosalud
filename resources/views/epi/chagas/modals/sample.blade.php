<div class="modal fade" id="exampleModal{{ $suspectcase->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" class="form-inline" action="{{ route('chagas.sampleBlood', $suspectcase) }}">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Toma de Muestra</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Ingreso los datos de la Toma de Muestra:</h6>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="for_name">Usuario que realiza la Toma de Muestra (Usuario
                                        Logeado):</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->OfficialFullName ?? '' }}"
                                        style="text-transform: uppercase;" readonly>
                                </fieldset>
                            </div>

                            <br>
                            <div class="row">
                                <fieldset class="form-group col-md-3">
                                    <label for="for_reception_at">Fecha de Recepción *</label>
                                    <input type="datetime-local" class="form-control" name="sample_at"
                                        id="for_reception_at" value="{{ date('Y-m-d\TH:i:s') }}"  max="{{ date('Y-m-d\TH:i:s') }}" required>
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
