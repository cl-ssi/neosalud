@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col">
        <h3 class="mb-3">
            Hoja PreHospitalaria
        </h3>
    </div>
    <div class="col text-end">
        Fecha 2022-07-01
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">1. Antecedentes del paciente</span>
    </div>
    <div class="card-body">
        <div class="row g-2 mb-2">
            <fieldset class="form-group col-sm-2">
                <label for="rut">RUT</label>
                <input type="text" class="form-control" id="rut" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-4">
                <label for="patient">Nombre del Paciente</label>
                <input type="text" class="form-control" id="patient" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-4">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" id="address" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label for="commune">Comuna</label>
                <input type="text" class="form-control" id="commune" value="" placeholder="">
            </fieldset>
        </div>
        <div class="row g-2 mb-2">
            <fieldset class="form-group col-sm-2">
                <label for="birthday">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthday" value="" placeholder="">
            </fieldset>
            <fieldset class="form-group col-sm-2">
                <label for="sex">Sexo</label>
                <select class="form-select" aria-label="" id="">
                    <option selected>Seleccione un sexo</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                  </select>
            </fieldset>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">2. Causal de Atención</span>
    </div>
    <div class="card-body">
        <div class="row g-2 mb-2">
            <fieldset class="form-group col-sm-2">
                <label class="form-label">Accidente de Tránsito</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="car-accident-1" name="car-accident">
                    <label class="form-check-label" for="car-accident-1">
                        Colisión
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="car-accident-2" name="car-accident">
                    <label class="form-check-label" for="car-accident-2">
                        Choque
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="car-accident-3" name="car-accident">
                    <label class="form-check-label" for="car-accident-3">
                        Atropello
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="car-accident-4" name="car-accident">
                    <label class="form-check-label" for="car-accident-4">
                        Volcamiento
                    </label>
                </div>
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label class="form-label">Intoxica</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-1" name="intoxication">
                    <label class="form-check-label" for="intoxication-1">
                        Drogas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-2" name="intoxication">
                    <label class="form-check-label" for="intoxication-2">
                        Medicamentos
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-3" name="intoxication">
                    <label class="form-check-label" for="intoxication-3">
                        Alcohol
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-4" name="intoxication">
                    <label class="form-check-label" for="intoxication-4">
                        Humo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-5" name="intoxication">
                    <label class="form-check-label" for="intoxication-5">
                        Gas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="intoxication-6" name="intoxication">
                    <label class="form-check-label" for="intoxication-6">
                        Otros
                    </label>
                </div>
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label class="form-label">Lesión</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="lesion-1">
                    <label class="form-check-label" for="lesion-1">
                        Cortopuzante
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="lesion-2">
                    <label class="form-check-label" for="lesion-2">
                        Arma de fuego
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="lesion-3">
                    <label class="form-check-label" for="lesion-3">
                        Contusas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="lesion-4">
                    <label class="form-check-label" for="lesion-4">
                        Aplastamiento
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="lesion-4">
                    <label class="form-check-label" for="lesion-4">
                        Otros
                    </label>
                </div>
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label class="form-label">Caidas</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="falls-1">
                    <label class="form-check-label" for="falls-1">
                        A nivel
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="falls-2">
                    <label class="form-check-label" for="falls-2">
                        De altura
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="falls-3">
                    <label class="form-check-label" for="falls-3">
                        Rodada
                    </label>
                </div>
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label class="form-label">Quemadas</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="burned-1">
                    <label class="form-check-label" for="burned-1">
                        Por fuego
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="burned-2">
                    <label class="form-check-label" for="burned-2">
                        Frío
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="burned-3">
                    <label class="form-check-label" for="burned-3">
                        Calor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="burned-4">
                    <label class="form-check-label" for="burned-4">
                        Electricidad
                    </label>
                </div>
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label class="form-label">Asfixia</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="suffocation-1">
                    <label class="form-check-label" for="suffocation-1">
                        Inmersión
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="suffocation-2">
                    <label class="form-check-label" for="suffocation-2">
                        Ahorcamiento
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="suffocation-3">
                    <label class="form-check-label" for="suffocation-3">
                        Cuerpo extraño
                    </label>
                </div>
            </fieldset>
        </div>

    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">3. Controles Parámetros vitales</span>
    </div>
    <div class="card-body">
        <div class="row g-2 mb-2">
            <fieldset class="form-group col-sm-2">
                <label for="timestamp">Fecha <br> hora</label>
                <input type="datetime-local" class="form-control" id="timestamp" value="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="fc">Frecuencia Cardíaca</label>
                <input type="text" class="form-control" id="fc" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="fr">Frecuencia <br>Respiratoria</label>
                <input type="text" class="form-control" id="fr" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="pa">Presión <br>Arterial</label>
                <input type="text" class="form-control" id="pa" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="pam">Presión <br>Arterial Media</label>
                <input type="text" class="form-control" id="pam" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="glasgow">Glasgow <br>&nbsp;</label>
                <input type="text" class="form-control" id="glasgow" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-2">
                <label for="saturation">% Saturación <br>Oxígeno/Ambi.</label>
                <input type="text" class="form-control" id="saturation" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="fill-capilar">Llene <br>Capilar</label>
                <input type="text" class="form-control" id="fill-capilar" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-1">
                <label for="t">Temperatura <br>°C</label>
                <input type="text" class="form-control" id="t" value="" placeholder="">
            </fieldset>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">4. Antecedentes Mórbidos</span>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <fieldset class="form-group col-sm-3">
                <label for="drug-allergy">Alergias Medicamentosa</label>
                <input type="text" class="form-control" id="drug-allergy" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="pharmacological-treatment">Tratamiento Farmacológico</label>
                <input type="text" class="form-control" id="pharmacological-treatment" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="toxic-habits">Hábitos tóxicos</label>
                <select id="toxic-habits" class="form-select">
                    <option value="">Seleccione un hábito tóxico</option>
                    <option value="tabaco">Tabaco</option>
                    <option value="oh">OH</option>
                    <option value="drogas">Drogas</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="surgical-history">Ant. Quirúrgicos</label>
                <input type="text" class="form-control" id="surgical-history" value="" placeholder="">
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="ethyl-breath">Aliento Etílico</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="yes" value="">
                    <label class="form-check-label" for="yes">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="no" value="">
                    <label class="form-check-label" for="no">No</label>
                    </div>
            </fieldset>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">5. Historia</span>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <fieldset class="col">
                <label for="history" class="form-label">Historia</label>
                <textarea class="form-control" id="history" rows="2"></textarea>
            </fieldset>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-header">
        <span class="fw-bold">6. Procedimientos</span>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <div class="col">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-1" value="option1">
                    <label class="form-check-label" for="option-1">CSV</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-2" value="option2">
                    <label class="form-check-label" for="option-2">Collar Cervical</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-3" value="option3">
                    <label class="form-check-label" for="option-3">Ferulas</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-4" value="option4">
                    <label class="form-check-label" for="option-4">Tabla Espinal Corta / Chaleco Ext.</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-5" value="option5">
                    <label class="form-check-label" for="option-5">Extricación</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-6" value="option6">
                    <label class="form-check-label" for="option-6">Máscara o2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-7" value="option7">
                    <label class="form-check-label" for="option-7">Vent. Asistida</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-8" value="option8">
                    <label class="form-check-label" for="option-8">Camilla</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-9" value="option9">
                    <label class="form-check-label" for="option-9">Aspiración</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-10" value="option10">
                    <label class="form-check-label" for="option-10">Nebulización</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-11" value="option11">
                    <label class="form-check-label" for="option-11">Monitor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-12" value="option12">
                    <label class="form-check-label" for="option-12">Marcapaso externo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-13" value="option13">
                    <label class="form-check-label" for="option-13">SAT o2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-14" value="option14">
                    <label class="form-check-label" for="option-14">Tabla Espinal Larga</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-15" value="option15">
                    <label class="form-check-label" for="option-15">HGT</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="option-16" value="option16">
                    <label class="form-check-label" for="option-16">Cricotirodostomia</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-header">
        <span class="fw-bold">7. Tiempos</span>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <fieldset class="form-group col-sm-2">
                <label for="departure_at">Hora Salida</label>
                <input type="time" class="form-control" id="departure_at" value="" placeholder="">
            </fieldset>
            <fieldset class="form-group col-sm-2">
                <label for="arrival_at">Arribo QTH</label>
                <input type="time" class="form-control" id="arrival_at" value="" placeholder="">
            </fieldset>
            <fieldset class="form-group col-sm-2">
                <label for="exit_to">Salida de QTH</label>
                <input type="time" class="form-control" id="exit_to" value="" placeholder="">
            </fieldset>
            <fieldset class="form-group col-sm-2">
                <label for="arrival_at_destionation">Arribo a destino</label>
                <input type="time" class="form-control" id="arrival_at_destionation" value="" placeholder="">
            </fieldset>
            <fieldset class="form-group col-sm-2">
                <label for="available_at">Disponible</label>
                <input type="time" class="form-control" id="available_at" value="" placeholder="">
            </fieldset>
        </div>
    </div>
</div>
@endsection
