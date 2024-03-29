@extends('layouts.app')
@section('content')
    @include('chagas.nav')

    <form method="POST" class="form-horizontal" action="{{ route('chagas.tracings.update', $tracing) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" class="form-control" name="suspect_case_id" id="suspect_case_id"
            value="{{ $tracing->suspect_case_id }}">
        <input type="hidden" class="form-control" name="patient_id" id="for_patient_id" value="{{ $tracing->patient_id }}">
        <div class="card">
            <div class="card-header" style="background-color: #f2f2f2; text-align: center;">
                <h4 style="margin: 0;">Editar Ficha de Seguimiento {{ $tracing->id }} para Paciente
                    {{ $tracing->patient->OfficialFullName ?? '' }}</h4>
            </div>
            <div class="card-body">
                <h4>Resultado</h4>
                <div class="row">
                    <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2">
                        <label for="">Fecha Entrega Resultado</label>
                        <input type="date" class="form-control" name="result_at" id="for_result_at"
                            value="{{ old('result_at', $tracing->result_at) }}" max="{{ date('Y-m-d') }}">
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_observation_of_result">Observación</label>
                        <input type="text" class="form-control" name="result_observation" id="for_result_observation"
                            value="{{ old('result_observation', $tracing->result_observation) }}" autocomplete="off">
                    </fieldset>
                </div>

                <hr>
                <h4>Mecanismo de entrega de Resultado</h4>
                @for ($i = 1; $i <= 4; $i++)
                    <div class="row">
                        <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2">
                            <label for="for_delivery_of_result_{{ $i }}">Fecha</label>
                            <input type="date" class="form-control" name="delivery_of_result_{{ $i }}"
                                id="for_delivery_of_result_{{ $i }}"
                                value="{{ old('delivery_of_result_' . $i, $tracing->{'delivery_of_result_' . $i}) }}"
                                max="{{ date('Y-m-d') }}">
                        </fieldset>

                        <fieldset class="form-group col-9 col-sm-5 col-md-4 col-lg-3">
                            <label for="for_mechanism_of_result_{{ $i }}">Mecanismo</label>
                            <select name="mechanism_of_result_{{ $i }}"
                                id="for_mechanism_of_result_{{ $i }}" class="form-select">
                                <option></option>
                                <option value="Pendiente"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Pendiente' ? 'selected' : '' }}>
                                    Pendiente
                                </option>
                                <option value="Llamada telefónica"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Llamada telefónica' ? 'selected' : '' }}>
                                    Llamada telefónica
                                </option>
                                <option value="Correo electrónico"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Correo electrónico' ? 'selected' : '' }}>
                                    Correo electrónico
                                </option>
                                <option value="Visita domiciliaria"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Visita domiciliaria' ? 'selected' : '' }}>
                                    Visita domiciliaria
                                </option>
                                <option value="Centro de salud"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Centro de salud' ? 'selected' : '' }}>
                                    Centro de salud
                                </option>
                                <option value="Carta certificada"
                                    {{ old('mechanism_of_result_' . $i, $tracing->{'mechanism_of_result_' . $i}) == 'Carta certificada' ? 'selected' : '' }}>
                                    Carta certificada
                                </option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group col-12 col-sm-6">
                            <label for="for_observation_of_result">Observación</label>
                            <input type="text" class="form-control" name="observation_of_result_{{ $i }}"
                                id="for_observation_of_result_{{ $i }}"
                                value="{{ old('observation_of_result_' . $i, $tracing->{'observation_of_result_' . $i}) }}"
                                autocomplete="off">
                        </fieldset>
                    </div>
                @endfor

                <hr>
                <h4>Interconsulta</h4>
                <div class="row">
                    <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2">
                        <label for="for_notification_at">Fecha de Interconsulta</label>
                        <input type="date" class="form-control" name="date_of_sic" id="for_date_of_sic" value="">
                    </fieldset>

                    <fieldset class="form-group col-4 col-sm-4 col-md-4 col-lg-4 order-1 order-lg-1">
                        <label for="for_index">Policlínico</label>
                        <select name="polyclinic_sic" id="for_index" class="form-select">
                            <option value=""></option>
                            <option value="Policlínico de Infectología+Policlínico de ARO"
                                {{ $tracing->polyclinic_sic == 'Policlínico de Infectología+Policlínico de ARO' ? 'selected' : '' }}>
                                Policlínico de Infectología+Policlínico de ARO</option>
                            <option value="Policlínico de Pediatría"
                                {{ $tracing->polyclinic_sic == 'Policlínico de Pediatría' ? 'selected' : '' }}>
                                Policlínico de Pediatría</option>
                        </select>
                    </fieldset>
                </div>


                <hr>
                <h4>Notificación</h4>
                <div class="row">
                    <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2">
                        <label for="for_date_of_notification">Fecha de Notificación</label>
                        <input type="date" class="form-control" name="date_of_notification" id="for_date_of_notification"
                            value="{{ $tracing->date_of_notification }}" max="{{ date('Y-m-d') }}">
                    </fieldset>

                    <fieldset class="form-group col-9 col-sm-5 col-md-4 col-lg-3">
                        <label for="for_epi_notification">Folio Epivigila</label>
                        <input type="number" name="epi_notification" id="for_epi_notification" class="form-control"
                            value="{{ $tracing->epi_notification }}" required>
                    </fieldset>

                    <fieldset class="form-group col-8 col-sm-5 col-md-6 col-lg-2">
                        <label for="for_cie10name_notification">Código CIE-10</label>
                        <select name="cie10name_notification" id="for_cie10name_notification" class="form-select"
                            title="Seleccione...">
                            <option value="">Seleccionar</option>
                            @foreach ($cie10s as $cie10)
                                <option value="{{ $cie10->code }}-{{ $cie10->name }}"
                                    @if ($cie10->code . '-' . $cie10->name == $tracing->cie10name_notification) selected @endif>
                                    {{ $cie10->code }}-{{ $cie10->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>

                <hr>
                <h4 class="mt-4">Ficha de Seguimiento</h4>
                <div class="row gx-3 gy-2 ">
                    <fieldset class="form-group col-5 col-sm-3 col-md-2 col-lg-1 order-1 order-lg-1">
                        <label for="for_index">Indice *</label>
                        <select name="index" id="for_index" class="form-select" required>
                            <option value=""></option>
                            <option value="1" {{ $tracing->index === 1 ? 'selected' : '' }}>Si</option>
                            <option value="0" {{ $tracing->index === 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6 col-md-5 col-lg-3 order-2 order-lg-2">
                        <label for="for_next_control_at">Próximo seguimiento*</label>
                        <input type="datetime-local" class="form-control" name="next_control_at"
                            id="for_next_control_at" required
                            value="{{ $tracing->next_control_at ? $tracing->next_control_at->format('Y-m-d\TH:i:s') : '' }}">
                    </fieldset>

                    <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2 order-3 order-lg-3">
                        <label for="for_status">Estado seguimiento*</label>
                        <select name="status" id="for_status_seguimiento" class="form-select" required>
                            <option value=""></option>
                            <option value="1" {{ $tracing->status == 1 ? 'selected' : '' }}>En seguimiento</option>
                            <option value="0" {{ $tracing->status === 0 ? 'selected' : '' }}>Fin
                                seguimiento
                            </option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group col-12 col-sm-12 col-md-9 col-lg-4 order-5 order-lg-4">
                        <label for="for_establishment_id">Establecimiento que realiza seguimiento*</label>
                        <select name="establishment_id" id="for_establishment_id" class="form-select">
                            <option value="{{ $tracing->establishment_id }}">{{ $tracing->organization->alias ?? '' }}</option>
                        </select>
                    </fieldset>
                </div>


                <!--**********************************-->
                <br>
                <div class="row gx-3 gy-2">
                    <fieldset class="form-group col-12 col-sm-7 col-md-4">
                        <label for="for_date_of_last_birth">Fecha de último parto</label>
                        <input type="date" class="form-control" name="date_of_last_birth" id="for_date_of_last_birth"
                            max="{{ date('Y-m-d\TH:i:s') }}" value="{{ $tracing->date_of_last_birth }}">
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-7 col-md-4">
                        <label for="for_occupation">Ocupación</label>
                        <input type="text" class="form-control" name="occupation" id="for_occupation"
                            value="{{ $tracing->occupation }}">
                    </fieldset>
                </div>

                <!--**********************************-->
                <br>
                <div class="row gx-3 gy-2">
                    <fieldset class="form-group col-12 col-sm-7 col-md-4">
                        <label for="for_responsible_family_member">Familiar responsable / teléfono</label>
                        <input type="text" class="form-control" name="responsible_family_member"
                            id="for_responsible_family_member" value="{{ $tracing->responsible_family_member }}">
                    </fieldset>
                </div>



                <!--**********************************-->
                <br>
                <div class="row gx-3 gy-2">
                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_allergies">Alergias</label>
                        <input type="text" class="form-control" name="allergies" id="for_allergies"
                            value="{{ $tracing->allergies }}">
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_common_use_drugs">Farmacos de uso común</label>
                        <input type="text" class="form-control" name="common_use_drugs" id="for_common_use_drugs"
                            value="{{ $tracing->common_use_drugs }}">
                    </fieldset>
                </div>


                <!--**********************************-->
                <br>
                <div class="row gx-3 gy-2">
                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_morbid_history">Antecedentes Mórbidos</label>
                        <input type="text" class="form-control" name="morbid_history" id="for_morbid_history"
                            value="{{ $tracing->morbid_history ?? '' }}">
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_family_history">Antecedentes Familiares</label>
                        <input type="text" class="form-control" name="family_history" id="for_family_history"
                            value="{{ $tracing->family_history ?? '' }}">
                    </fieldset>
                </div>


                <!--**********************************-->
                <br>
                <div class="row gx-3 gy-2">
                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_indications">Indicaciones</label>
                        <textarea class="form-control" name="indications" id="for_indications" rows="4">{{ $tracing->indications ?? '' }}</textarea>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6">
                        <label for="for_observations">Observaciones</label>
                        <textarea class="form-control" name="observations" id="for_observations" rows="4">{{ $tracing->observations ?? '' }}</textarea>
                    </fieldset>
                </div>


                <button type="submit" class="btn btn-primary">Actualizar</button>

                <a class="btn btn-outline-secondary"
                    href="{{ route('chagas.tracings.index', ['organization' => $tracing->establishment_id ?? '']) }}">
                    Cancelar
                </a>






            </div>
        </div>

    </form>
@endsection
