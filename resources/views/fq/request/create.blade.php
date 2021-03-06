@extends('fq.app')

@section('title', 'Tebi')

@section('content')

<h5>Ingreso de Solicitud</h5>

<br>

<h6>Contacto</h6>
<br>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="text-center table-info">
            <tr>
                <th scope="col" style="width: 5%">Identificación</th>
                <th scope="col" style="width: 20%">Nombre Completo</th>
                <th scope="col" style="width: 20%">Dirección</th>
                <th scope="col">Comuna</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col" style="width: 4%"></th>
            </tr>
        </thead>
          @foreach($contactUsers as $contactUser)
            <tr>
              <td>
                @foreach($contactUser->user->identifiers as $identifier)
                  {{ $identifier->value }}-{{ $identifier->dv }}<br>
                @endforeach
              </td>
              <td>{{ $contactUser->user->OfficialFullName }}</td>
              <td>
                @foreach($contactUser->user->addresses as $address)
                  {{ $address->text }} {{ $address->line }}<br>
                @endforeach
              </td>
              <td>
                @foreach($contactUser->user->addresses as $address)
                  {{ $address->city }}<br>
                @endforeach
              </td>
              <td>
                @foreach($contactUser->user->contactPoints->where('system', 'email') as $contactPoint)
                  {{ $contactPoint->value }}<br>
                @endforeach
              </td>
              <td>
                @foreach($contactUser->user->contactPoints->where('system', 'phone') as $contactPoint)
                  +56 {{ $contactPoint->value }}<br>
                @endforeach
              </td>
              <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#viewPersonalInformatioModal">
                      <i class="fas fa-edit"></i>
                  </button>

                  @include('fq.request.modals.view_personal_information')
              </td>
            </tr>
          @endforeach
        <tbody>
        <tbody>
    </table>
</div>

<hr>

<h6>Paciente</h6>
<br>

<form method="POST" class="form-horizontal" action="{{ route('fq.request.store', $contactUser) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="text-center table-info">
            <tr>
                <th scope="col" style="width: 5%">Identificación</th>
                <th scope="col" style="width: 20%">Nombre Completo</th>
                <!-- <th scope="col" style="width: 20%">Dirección</th>
                <th scope="col">Comuna</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th> -->
                <!-- <th style="width: 5%"></th> -->
                <th style="width: 4%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactUser->user->usersPatients as $usersPatient)
            <tr>
                <td>
                  @foreach($usersPatient->user->identifiers as $identifier)
                    {{ $identifier->value }}-{{ $identifier->dv }}<br>
                  @endforeach
                </td>
                <td>
                  {{ $usersPatient->user->OfficialFullName }}<br>
                </td>
                <!-- <td> -->
                  {{-- @foreach($usersPatient->user->addresses as $address)
                    {{ $address->text }} {{ $address->line }}<br>
                  @endforeach --}}
                <!-- </td>
                <td> -->
                  {{-- @foreach($usersPatient->user->addresses as $address)
                    {{ $address->city }}<br>
                  @endforeach --}}
                <!-- </td>
                <td> -->
                  {{-- @foreach($usersPatient->user->contactPoints->where('system', 'email') as $contactPoint)
                    {{ $contactPoint->value }}<br>
                  @endforeach --}}
                <!-- </td>
                <td> -->
                  {{-- @foreach($usersPatient->user->contactPoints->where('system', 'phone') as $contactPoint)
                    +56 {{ $contactPoint->value }}<br>
                  @endforeach --}}
                <!-- </td> -->
                <td class="text-center">
                    <fieldset class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="patient_id"
                                value="{{ $usersPatient->user->id }}" required>
                        </div>
                    </fieldset>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <fieldset class="form-group col-sm-4">
                    <label for="for_name">Motivo de Solicitud</label>
                    <select name="name" id="for_name" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="specialty hours">Horas de especialidad</option>
                        <option value="dispensing">Dispensación de receta</option>
                        <option value="home hospitalization">Contacto con hospitalización domiciliaria</option>
                        <option value="exam request">Solicitud de exámenes</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-3">
                    <label for="for_specialties">Especialidad</label>
                    <select name="specialties" id="for_specialties" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="broncopulmonar">Broncopulmonar</option>
                        <option value="otorrinolaringología">Otorrinolaringología</option>
                        <option value="endocrinología">Endocrinología</option>
                        <option value="gastroenterología">Gastroenterología</option>
                        <option value="other">Otra</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-2">
                    <label for="for_other_specialty">Especialidad</label>
                    <select name="other_specialty" id="for_other_specialty" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="kinesiología">Kinesiología</option>
                        <option value="nutrición">Nutrición</option>
                        <option value="enfermería">Enfermería</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-3">
                    <div class="mb-3">
                      <label for="for_file" class="form-label">Adjuntar documentos</label>
                      <input class="form-control" type="file" name="file[]" multiple id="for_file">
                    </div>
                </fieldset>
            </div>

            <div class="form-row" id="medicines">
                <fieldset class="form-group col-sm-4">
                    <div class="mb-3">
                      <label for="for_medicines" class="form-label">Farmacos</label>
                      <select name="medicines[]" class="form-control selectpicker" multiple>
                          <option value="">Seleccione...</option>
                          @foreach($ext_medicines as $ext_medicine)
                            <option value="{{ $ext_medicine->id }}">{{ $ext_medicine->name }}</option>
                          @endforeach
                      </select>
                    </div>
                </fieldset>
            </div>

            <div class="form-row">
                <fieldset class="form-group col-sm">
                  <label for="observation_patient" class="form-label">Observación</label>
                  <textarea class="form-control" name="observation_patient" id="for_observation_patient" rows="3"></textarea>
                </fieldset>
            </div>

            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>


</form>

<br><br>

@endsection

@section('custom_js')

<script type="text/javascript">
    $('#for_specialties').attr("disabled", true);
    $('#for_other_specialty').attr("disabled", true);
    $('#for_file').attr("disabled", true);
    $('#medicines').hide();

    jQuery('select[name=name]').change(function(){
        var fieldsetName = $(this).val();
        switch(this.value){
            case "specialty hours":
                $('#for_specialties').attr("disabled", false);
                $('#medicines').hide();
                $('#for_file').attr("disabled", true);
                document.getElementById('for_file').value = '';

                break;

            case "dispensing":
                $('#for_file').attr("disabled", false);
                $('#medicines').show();
                $('#for_specialties').attr("disabled", true);
                $('#for_other_specialty').attr("disabled", true);
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').value = '';
                break;

            case "home hospitalization":
                $('#for_file').attr("disabled", true);
                $('#medicines').hide();
                $('#for_specialties').attr("disabled", true);
                $('#for_other_specialty').attr("disabled", true);
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').value = '';
                document.getElementById('for_file').value = '';
                break;

            case "exam request":
                $('#for_file').attr("disabled", false);
                $('#medicines').hide();
                $('#for_specialties').attr("disabled", true);
                $('#for_other_specialty').attr("disabled", true);
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').value = '';
                document.getElementById('for_file').value = '';
                break;

            default:
                $('#for_specialties').attr("disabled", true);
                $('#for_other_specialty').attr("disabled", true);
                $('#for_file').attr("disabled", true);
                $('#medicines').hide();
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').value = '';
                document.getElementById('for_prescription_file').value = '';
                break;
        }
    });

    jQuery('select[name=specialties]').change(function(){
        var fieldsetName = $(this).val();
        switch(this.value){
            case "other":
                $('#for_other_specialty').attr("disabled", false);
                break;

            default:
                $('#for_other_specialty').attr("disabled", true);
                document.getElementById('for_other_specialty').value = '';
                break;
        }
    });
</script>

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->

@endsection
