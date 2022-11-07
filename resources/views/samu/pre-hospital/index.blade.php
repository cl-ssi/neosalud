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

<div class="card-body">
<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th>Turno</th>
                <th>Movil</th>
                <th>Posición</th>
                <th>Tipo</th>
                <th>Qtc</th>
                <th>Clave</th>
                <th>Móvil</th>
                <th>Estado</th>
                <th>O2 central</th>
                <th>Observación</th>
                <!-- <th>Almuerzo</th> -->
            </tr>

            <tr>
                <td>Turno 2022-08-31 08:00:00 Largo (Abierto)</td>
                <td><b>2 SAMU</b></td>
                <td>5</td>
                <td>M2</td>
                <td>1</td>
                <td>2</td>
                <td>962161425</td>
                <td>Activo</td>
                <td></td>
                <td></td>
                <!-- <td>14:46 - 15:46 - 0"</td> -->
            </tr>
        </tbody>
    </table>
</div>
</div>

<h4>1. Antecedentes generales</h4>
<!-- <div class="row g-2">
    <fieldset class="form-group col-sm-1">
        <label for="for_type">Tipo de móvil*</label>
        <select class="form-control" name="mobile_type_id" required>
            <option value="Seleccioneñ"></option>
            @foreach($types as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </fieldset>
</div> -->

<div class="row g-2 mb-2">

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Fecha de atención</label>
        <input type="date" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Rale</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="patient">Traslado a</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="">
    </fieldset>

    <!-- <fieldset class="form-group col-sm-1">
        <label for="birthday">Qtc</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="birthday">Clave</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset> -->

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Base</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset>

    <!-- <fieldset class="form-group col-sm-1">
        <label for="birthday">Móvil</label>
        <input type="text" class="form-control" id="birthday" value="" placeholder="">
    </fieldset> -->

    <fieldset class="form-group col-sm-3">
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

<div class="row g-2 mb-2">
    <!-- <fieldset class="form-group col-sm-1">
        <label for="rut">Previsión</label>
        <select class="form-select" aria-label="" id="">
            <option selected>Seleccione</option>
            <option value="F">F</option>
            <option value="I">I</option>
            <option value="P">P</option>
            <option value="Otro">Otro</option>
        </select>
    </fieldset> -->

    <fieldset class="form-group col-sm-2">
        <label for="patient">Previsión</label>
        <input type="text" class="form-control" id="previsión" name="prevision" value="" placeholder="" disabled>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="patient">Otro</label>
        <input type="text" class="form-control" id="previsión_otro" value="" placeholder="" disabled>
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
        <label class="form-label">Accidente de Tránsito</label><br>
        
        <input type="checkbox" id="cbx_colision" name="work_accident[]" value="colision"> <label for="cbx_colision">Colisión</label><br>
        <input type="checkbox" id="cbx_choque" name="work_accident[]" value="choque"> <label for="cbx_choque">Choque</label><br>
        <input type="checkbox" id="cbx_atropello" name="work_accident[]" value="atropello"> <label for="cbx_atropello">Apropello</label><br>
        <input type="checkbox" id="cbx_volcamiento" name="work_accident[]" value="volcamiento"> <label for="cbx_volcamiento">Volcamiento</label><br><br>

    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label class="form-label">Intoxicación</label><br>

        <input type="checkbox" id="cbx_drougs" name="poisoning[]" value="drogas"> <label for="cbx_drougs">Drogas</label><br>
        <input type="checkbox" id="cbx_medicines" name="poisoning[]" value="medicamentos"> <label for="cbx_medicines">Medicamentos</label><br>
        <input type="checkbox" id="cbx_alcohol" name="poisoning[]" value="alcohol"> <label for="cbx_alcohol">Alcohol</label><br>
        <input type="checkbox" id="cbx_smoke" name="poisoning[]" value="humo"> <label for="cbx_smoke">Humo</label><br>
        <input type="checkbox" id="cbx_gas" name="poisoning[]" value="gas"> <label for="cbx_gas">Gas</label><br>
        <input type="checkbox" id="cbx_poisoning_others" name="poisoning[]" value="otros"> <label for="cbx_others">Otros</label><br>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label class="form-label">Lesión</label><br>

        <input type="checkbox" id="cbx_sharp" name="injuries[]" value="cortopunzante"> <label for="cbx_sharp">Cortopuzante</label><br>
        <input type="checkbox" id="cbx_firearm" name="injuries[]" value="arma de fuego"> <label for="cbx_firearm">Arma de fuego</label><br>
        <input type="checkbox" id="cbx_bruised" name="injuries[]" value="contusas"> <label for="cbx_bruised">Contusas</label><br>
        <input type="checkbox" id="cbx_flattening" name="injuries[]" value="aplastamiento"> <label for="cbx_flattening">Aplastamiento</label><br>
        <input type="checkbox" id="cbx_injuries_others" name="injuries[]" value="otros"> <label for="cbx_injuries_others">Otros</label><br>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label class="form-label">Caidas</label><br>

        <input type="checkbox" id="cbx_ground_level" name="falls[]" value="a nivel"> <label for="cbx_ground_level">A nivel</label><br>
        <input type="checkbox" id="cbx_from_height" name="falls[]" value="de altura"> <label for="cbx_from_height">De altura</label><br>
        <input type="checkbox" id="cbx_shot" name="falls[]" value="rodada"> <label for="cbx_shot">Rodada</label><br>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label class="form-label">Quemadas</label><br>
        
        <input type="checkbox" id="cbx_fire" name="burneds[]" value="fuego"> <label for="cbx_fire">Fuego</label><br>
        <input type="checkbox" id="cbx_cold" name="burneds[]" value="frio"> <label for="cbx_cold">Frío</label><br>
        <input type="checkbox" id="cbx_heat" name="burneds[]" value="calor"> <label for="cbx_heat">Calor</label><br>
        <input type="checkbox" id="cbx_electricity" name="burneds[]" value="electricidad"> <label for="cbx_electricity">Electricidad</label><br>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label class="form-label">Asfixia</label><br>

        <input type="checkbox" id="cbx_immersion" name="suffocations[]" value="inmersión"> <label for="cbx_immersion">Inmersión</label><br>
        <input type="checkbox" id="cbx_hanging" name="suffocations[]" value="ahorcamiento"> <label for="cbx_hanging">Ahorcamiento</label><br>
        <input type="checkbox" id="cbx_strange_body" name="suffocations[]" value="cuerpo extraño"> <label for="cbx_strange_body">Cuerpo extraño</label><br>
    </fieldset>
</div>

<h4>Antecedentes accidente</h4>

<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-3">
        <label for="address">Vehículos involucrados</label>
        <input type="text" class="form-control accident_history_class" id="patient" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="address">N° lesionados</label>
        <input type="text" class="form-control accident_history_class" id="patient" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="address">Caída desde vehículos</label>
        <select class="form-select accident_history_class" aria-label="" name="vehicles_involved">
            <option selected>Seleccione</option>
            <option value="Detenido">Detenido</option>
            <option value="Movimiento">Movimiento</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="address">Uso de casco</label>
        <select class="form-select accident_history_class" aria-label="" id="" name="occupant">
            <option selected>Seleccione</option>
            <option value="Conductor">Conductor</option>
            <option value="Desconocido">Desconocido</option>
            <option value="Anterior">Anterior</option>
            <option value="Posterior">Posterior</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="address">Ocupante</label>
        <select class="form-select accident_history_class" aria-label="" id="" name="use_of_helmet">
            <option selected>Seleccione</option>
            <option value="Sí">Sí</option>
            <option value="No">No</option>
            <option value="Desconocido">Desconocido</option>
        </select>
    </fieldset>
</div>

<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-3">
        <label for="address">Accidente</label>
        <select class="form-select accident_history_class" aria-label="" id="address">
            <option selected>Seleccione</option>
            <option value="Escolar">Escolar</option>
            <option value="Trabajo">Trabajo</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="commune">Soap - Compañía</label>
        <input type="text" class="form-control accident_history_class" id="commune" name="soap_company" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="commune">Soap - N° póliza</label>
        <input type="text" class="form-control accident_history_class" id="commune" name="soap_number" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-2">
        <label for="birthday">Comisaria</label>
        <input type="text" class="form-control accident_history_class" id="birthday" value="" placeholder="">
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="birthday">Patente de vehículo</label>
        <input type="text" class="form-control accident_history_class" id="birthday" value="" placeholder="">
    </fieldset>
</div>

<div class="row g-2 mb-2">

    <fieldset class="form-group col-sm-9">
    </fieldset>
    <fieldset class="form-group col-sm-3">
        <label for="birthday">Patente de vehículo 2</label>
        <input type="text" class="form-control accident_history_class" id="birthday" value="" placeholder="">
    </fieldset>

</div>

<h4>5. Controles Parámetros vitales</h4>
<div class="row g-2 mb-2">
    <fieldset class="form-group col-sm-2">
        <label for="timestamp">Fecha<br> hora</label>
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
                        <li>
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
                                        <li>
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
    $("input.accident_history_class").attr("disabled",true);
    $("select.accident_history_class").attr("disabled",true);

    // desbloquea antecedentes accidente si se marca un accidente
    $("input[name='work_accident[]").change(function() {
        cont = 0;
        jQuery("input[name='work_accident[]']").each(function() {
            if(this.checked){
                cont = cont + 1;
            }
        });

        if(cont > 0){
            $("input.accident_history_class").attr("disabled",false);
            $("select.accident_history_class").attr("disabled",false);
        }else{
            $("input.accident_history_class").attr("disabled",true);
            $("select.accident_history_class").attr("disabled",true);
        }  
    });
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
