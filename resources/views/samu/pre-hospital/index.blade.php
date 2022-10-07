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

<h4>1. Antecedentes generales</h4>
<div class="row g-2">
    <!-- <fieldset class="form-group col-sm-2">

        <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
            Avanzada
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            Básica
        </label>
        </div>

    </fieldset> -->

    <fieldset class="form-group col-sm-1">
        <label for="for_type">Tipo de móvil*</label>
        <select class="form-control" name="mobile_type_id" required>
            <option value="Seleccioneñ"></option>
            @foreach($types as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </fieldset>
</div>


<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-1">
        <label for="rut">Previsión</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="F">F</option>
            <option value="I">I</option>
            <option value="P">P</option>
            <option value="Otro">Otro</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Otro</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="address">Accidente</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="Escolar">Escolar</option>
            <option value="Trabajo">Trabajo</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="commune">Soap - Compañía</label>
        <input type="text" class="form-control" id="commune" name="soap_company" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="commune">Soap - N° póliza</label>
        <input type="text" class="form-control" id="commune" name="soap_number" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Comisaria</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Patente de vehículo</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Patente de vehículo 2</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>
</div>

<div class="row g-2 mb-2">

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Fecha</label>
        <input type="date" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Rale</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Traslado a</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="birthday">Qtc</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="birthday">Clave</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="birthday">Base</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="birthday">Móvil</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="birthday">S.Reanimación</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione la opción</option>
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>
    </fieldset>

</div>

<h4>2. Antecedentes del paciente</h4>
<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-1">
        <label for="rut">RUT</label>
        <input type="text" class="form-control" id="rut" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Nombre del Paciente</label>
        <input type="text" class="form-control" id="patient" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="address">Dirección</label>
        <input type="text" class="form-control" id="address" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="commune">Comuna</label>
        <input type="text" class="form-control" id="commune" value="" placeholder="">
    </fieldset>
    <fieldset class="form-group col-sm-1">
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
    <fieldset class="form-group col-sm-1">
        <label for="for_age">Edad</label>
        <input type="number" class="form-control" id="age" name="age" value="" placeholder="">
    </fieldset>
</div>

<!--<h4>3. Antecedentes Médicos</h4>
<h5>3.1. Antecedentes mórbidos</h5>
<div class="row g-2">
    @foreach($morbidHistories as $morbidHistory)
        <fieldset class="form-group col-sm-2">
            <div class="form-check form-check-inline">
                <input type="checkbox" name="morbid_histories" id="morbidHistory_{{$morbidHistory->id}}" value="{{$morbidHistory->id}}"> <label for="morbidHistory_{{$morbidHistory->id}}">{{$morbidHistory->name}}</label>
                <input type="text" class="form-control" id="commune" value="" placeholder="">
            </div>
        </fieldset>
    @endforeach
</div> -->

<h4>3. Antecedentes adicionales</h4>
<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-2">
        <label for="sex">Antecedentes mórbidos</label><br>
        @foreach($morbidHistories as $morbidHistory)
        <input type="checkbox" name="morbid_histories" id="morbidHistory_{{$morbidHistory->id}}" value="{{$morbidHistory->id}}"> <label for="morbidHistory_{{$morbidHistory->id}}">{{$morbidHistory->name}}</label>
                <input type="text" class="form-control" id="commune" value="" placeholder="">
        @endforeach
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <br>
        <label for="sex">Aliento etílico</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="1">Sí</option>
            <option value="2">No</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <br>
        <label for="patient">Tratamiento actual drogas</label>
        <input type="text" class="form-control" id="patient" value="" placeholder="Tratamiento 1">
        <input type="text" class="form-control" id="patient" value="" placeholder="Tratamiento 2">
        <input type="text" class="form-control" id="patient" value="" placeholder="Tratamiento 3">
        <input type="text" class="form-control" id="patient" value="" placeholder="Tratamiento 4">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <br>
        <label for="sex">Alergias</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="Desconocido">Desconocido</option>
            <option value="1">Sí</option>
            <option value="2">No</option>
        </select>
        <input type="text" class="form-control" id="patient" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <br>
        <label for="patient">Ant.Gineco.Obstet.</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="1">G</option>
            <option value="2">P</option>
            <option value="2">A</option>
            <option value="2">FUR</option>
        </select>
    </fieldset>
</div>

<h4>4. Causal de atención</h4>
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

        <label class="form-label">Vehículos involucrados</label>
        <input type="text" class="form-control w-50" id="patient" value="" placeholder="">
        <label class="form-label">N° de lesionados</label>
        <input type="text" class="form-control w-50" id="patient" value="" placeholder="">

        <label for="patient">Caída desde vehículos</label>
        <select class="form-select w-50" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="Detenido">Detenido</option>
            <option value="Movimiento">Movimiento</option>
        </select>

        <label for="patient">Uso de casco</label>
        <select class="form-select w-50" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="Sí">Sí</option>
            <option value="No">No</option>
            <option value="Desconocido">Desconocido</option>
        </select>

        <label for="patient">Ocupante</label>
        <select class="form-select w-50" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="Conductor">Conductor</option>
            <option value="Desconocido">Desconocido</option>
            <option value="Anterior">Anterior</option>
            <option value="Posterior">Posterior</option>
        </select>

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

<h4>5. Controles Parámetros vitales</h4>
<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-2">
        <label for="timestamp">Fecha <br> hora</label>
        <input type="datetime-local" class="form-control" id="timestamp" value="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="fc">Frecuencia <br> Cardíaca</label>
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

    <fieldset class="form-group col-sm">
        <br><br>
        <div class="input-group">
            <div class="input-group-append" id="button-addon4">
                <button class="btn btn-outline-secondary" type="button" id="start">Agregar</button>
            </div>
        </div>
    </fieldset>
</div>








 




<div class="col-12 col-md-11">
    <table class="table table-sm">
        <thead class="table-light">
            <tr>
                <th>Fecha hora</th>
                <th>Frecuencia Cardíaca</th>
                <th>Frecuencia Respiratoria</th>
                <th>Presión Arterial</th>
                <th>Presión Arterial Media</th>
                <th>Glasgow</th>
                <th>% Saturación Oxígeno/Ambi.</th>
                <th>Llene Capilar</th>
                <th>Temperatura °C</th>
            </tr>
        </thead>
            <tbody>
                <tr class="">
                    <td>01/10/2022 10:00</td>
                    <td>64x</td>
                    <td>20x</td>
                    <td>149/67</td>
                    <td>97</td>
                    <td>15</td>
                    <td>98%</td>
                    <td>-2</td>
                    <td>36°C</td>
                </tr>
                <tr class="">
                    <td>01/10/2022 10:30</td>
                    <td>63x</td>
                    <td>25x</td>
                    <td>140/60</td>
                    <td>97</td>
                    <td>20</td>
                    <td>95%</td>
                    <td>0</td>
                    <td>36,5°C</td>
                </tr>
            </tbody>
    </table>
</div>

<h4>6. Historia</h4>
<div class="row g-2">
    <fieldset class="col">
        <!-- <label for="history" class="form-label">Historia</label> -->
        <textarea class="form-control" id="history" rows="2"></textarea>
    </fieldset>
</div>

<h4>7. Procedimientos</h4>
<div class="row g-2">
    <div class="col">
        @foreach($procedures as $procedure)
            <div class="form-check form-check-inline">
                <input type="checkbox" name="procedures" id="procedure_{{$procedure->id}}" value="{{$procedure->id}}"> <label for="procedure_{{$procedure->id}}">{{$procedure->name}}</label>
            </div>
        @endforeach
    </div>
</div>

<h4>8. Tiempos</h4>
<div class="row g-2">
    <fieldset class="form-group col-sm">
        <label for="departure_at">Hora Salida</label>
        <input type="time" class="form-control" id="departure_at" value="" placeholder="">
    </fieldset>
    <fieldset class="form-group col-sm">
        <label for="arrival_at">Arribo QTH</label>
        <input type="time" class="form-control" id="arrival_at" value="" placeholder="">
    </fieldset>
    <fieldset class="form-group col-sm">
        <label for="exit_to">Salida de QTH</label>
        <input type="time" class="form-control" id="exit_to" value="" placeholder="">
    </fieldset>
    <fieldset class="form-group col-sm">
        <label for="arrival_at_destionation">Arribo a destino</label>
        <input type="time" class="form-control" id="arrival_at_destionation" value="" placeholder="">
    </fieldset>
    <fieldset class="form-group col-sm">
        <label for="available_at">Disponible</label>
        <input type="time" class="form-control" id="available_at" value="" placeholder="">
    </fieldset>
</div>

<h4>9. Alteraciones</h4>
<div class="row g-2">
    @foreach($array_alterations as $key => $array_alteration)
        <fieldset class="form-group col-sm">
            <b>{{$key}}</b>
            <ul class="list-group list-group-flush">
                @foreach($alterations as $alteration)
                    @if($alteration->type == $key)
                        <li class="list-group-item">
                            <input type="checkbox" name="alterations" id="alterations_{{$alteration->id}}" value="{{$alteration->id}}"> <label for="alterations_{{$alteration->id}}">{{$alteration->name}}</label>
                        </li>
                    @endif
                @endforeach
            </ul>
        </fieldset>
    @endforeach
</div>


<h4>10. Medicamentos</h4>
<div class="row g-2">

    <fieldset class="form-group col-sm">
        <label for="hr">Hr</label>
        <input type="time" class="form-control" id="departure_at" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm">
        <label for="hr">Dosis</label>
        <input type="text" class="form-control" id="hr" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm">
        <label for="sex">Medicamento/solución</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Medicamento</option>
            @foreach($medicines as $medicine)
            <option value="{{$medicine->id}}">{{$medicine->name}}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-sm">
        <label for="hr">Vía</label><br>
        <select class="form-select" aria-label="" id="">
            <option></option>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm">
        <br>
        <div class="input-group">
            <div class="input-group-append" id="button-addon4">
                <button class="btn btn-outline-secondary" type="button" id="start">Agregar</button>
            </div>
        </div>
    </fieldset>

</div>

<div class="col-12 col-md-11">
    <table class="table table-sm">
        <thead class="table-light">
            <tr>
                <th>Fecha hora</th>
                <th>Dosis</th>
                <th>Medicamento/Solución</th>
                <th>Dosis</th>
            </tr>
        </thead>
            <tbody>
                <tr class="">
                    <td>01/10/2022 14:00</td>
                    <td></td>
                    <td>Puff BT</td>
                    <td></td>
                </tr>
                <tr class="">
                    <td>01/10/2022 15:35</td>
                    <td>3</td>
                    <td>Paracetamol</td>
                    <td>Intravenosa</td>
                </tr>
            </tbody>
    </table>
</div>



<h4>11. Escala de glasgow</h4>

<fieldset class="form-group col-sm">
        <input class="form-check-input" type="radio" id="glasgow-adulto" name="glasgow" checked onchange="toggleCheckbox(this)">
        <label class="form-check-label" for="glasgow-adulto">
            Adulto
        </label>
        <input class="form-check-input" type="radio" id="glasgow-lactante" name="glasgow" onchange="toggleCheckbox(this)">
        <label class="form-check-label" for="glasgow-lactante">
            Lactante
        </label>
</fieldset>

<div class="row g-2">
    @foreach($array_glasgow_scales as $key1 => $age_range)
    <div class="card" style="width: 18rem;" id="{{$key1}}" style="display: none;">
            @foreach($age_range as $key2 => $type)
                
                <div class="card mb-5">
                    <div class="card-header">
                        <span class="fw-bold">{{$key2}}</span>
                    </div>
                    <div class="card-body">

                        <div class="row g-2">
                            <div class="col">
                                @foreach($glasgow_scales as $glasgow_scale)
                                    
                                    @if($glasgow_scale->age_range == $key1 && $glasgow_scale->type == $key2)
                                        <li class="list-group-item">
                                            <input type="checkbox" name="glasgow_scales" id="glasgow_scales_{{$glasgow_scale->id}}" value="{{$glasgow_scale->id}}"> <label for="glasgow_scales_{{$glasgow_scale->id}}">{{$glasgow_scale->name}} - [{{$glasgow_scale->value}}]</label>
                                        </li>
                                    @endif

                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach
    </div>
    @endforeach
</div>

@endsection

@section('custom_js')
<!-- <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}"> -->

<script>

$(document).ready(function() {
    $("#ADULTO").show();
    $("#LACTANTE").hide(); 
});

function toggleCheckbox(element)
{
    if(element.id == "glasgow-adulto"){
        $("#LACTANTE").hide();
        $("#ADULTO").show();
    }else{
        $("#LACTANTE").show();
        $("#ADULTO").hide();
    }
}

</script>
@endsection
