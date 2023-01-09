@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear nuevo paciente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <form method="POST" class="form-horizontal" action="{{ route('patient.store') }}">
        @csrf
        @method('POST')

        @livewire('user.user-identifiers', compact('identifierTypes'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h5>

                <input type="hidden" name='human_name_use' value='official'>
                <div class="row">
                    <fieldset class="form-group col-md-4">
                        <label for="for_given">Nombres *</label>
                        <input type="text" class="form-control" name="given" id="for_given" required
                               value="{{ old('given') ?? ($sic ? $sic->patient_name : '')  }}"
                        >
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_fathers_family">Apellido Paterno *</label>
                        <input type="text" class="form-control" name="fathers_family" id="for_fathers_family" required
                               value="{{ old('fathers_family') ?? ($sic ? $sic->patient_fathers_family : '') }}"
                        >
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_mothers_family">Apellido Materno</label>
                        <input type="text" class="form-control" name="mothers_family" id="for_mothers_family"
                               value="{{ old('mothers_family') ?? ($sic ? $sic->patient_mothers_family : '') }}"
                        >
                    </fieldset>

                    <fieldset class="form-group col-md-2">
                        <label for="for_social_name">Nombre Social</label>
                        <input type="text" class="form-control" name="social_name" id="social_name"
                               value="{{$sic ? $sic->patient_social_name : ''}}"
                        >

                    </fieldset>
                </div>
                <div class="row">
                    <fieldset class="form-group col-md-4">
                        <label for="for_birthday">Fecha de nacimiento *</label>
                        <input type="date" class="form-control" name="birthday" required
                               value="{{ old('birthday') ?? ($sic ? $sic->patient_birthday->format('Y-m-d') : '') }}"
                        >
                    </fieldset>

                    <fieldset class="form-group col-md-2">
                        <label for="for_sex">Sexo *</label>
                        <select name="sex" id="for_sex" class="form-control" required>
                            <option value=""></option>
                            @foreach($sexes as $sex)
                                <option
                                    value="{{$sex->id}}" {{old('sex') == $sex->id ? 'selected' : ''}}>{{$sex->text}}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_gender">Identidad de Género *</label>
                        <select name="gender" id="for_gender" class="form-control" required>
                            <option value=""></option>
                            @foreach($genders as $gender)
                                <option
                                    value="{{$gender->id}}" {{old('gender') == $gender->id ? 'selected' : ''}}>{{$gender->text}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <fieldset class="form-group col-md-3">
                        <label for="for_cod_con_marital_id">Estado Civil *</label>
                        <select name="cod_con_marital_id" id="for_cod_con_marital_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($maritalStatus as $status)
                                <option
                                    value="{{ $status->id }}" {{(old('cod_con_marital_id') == $status->id) ? 'selected' : ''}}>{{ $status->text }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>

                <div class="row">

                </div>
                <div class="row">
                    <fieldset class="form-group col-md-4">
                        <label for="for_nationality_id">Nacionalidad *</label>
                        <select name="nationality_id" id="for_nationality_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->id }}" {{(old('nationality_id') == $country->id) ? 'selected' : ''}} >{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="for_congregation_id">Pueblo originario</label>
                        <select name="congregation_id[]" id="for_congregation_id" class="form-control selectpicker"
                                data-live-search="true" multiple="" data-size="10" title="Seleccione..." multiple
                                data-actions-box="true">
                            @foreach($congregations as $congregation)
                                <option
                                    value="{{ $congregation->id }}" {{(old('congregation_id.0') == $congregation->id) ? 'selected' : ''}}>{{ $congregation->name}}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="for_congregation_other">Otro Pueblo Originario</label>
                        <input type="text" class="form-control" name="congregation_other" id="for_congregation_other"
                               value="{{ old('congregation_other') }}"
                               disabled>
                    </fieldset>
                </div>


            </div>
        </div>


        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-addresses', compact('regions', 'countries', 'sic'))

        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-contact-points', compact('sic'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Previsión</h5>

                <div class="row">
                    <fieldset class="form-group col-md-2">
                        <label for="">Rut Previsión</label>
                        <input type="text" class="form-control" name="identifier" id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="">Vencimiento</label>
                        <input type="date" class="form-control" name="identifier" id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="">Titular</label>
                        <input type="text" class="form-control" name="identifier" id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="">Previsión</label>
                        <input type="text" class="form-control" name="identifier" id="for_identifier">
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-practitioners', compact('organizations', 'professions', 'specialties'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <!-- <h5 class="card-title">Permisos</h5> -->
                <div class="row">
                    <fieldset class="form-group col-md">
                        <label for="for_name">Permisos</label>
                        <select class="form-control selectpicker" name="permissions[]" multiple>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-save"></i> Guardar</button>


    </form>
@endsection

@section('custom_js')
    <script src='{{asset("js/jquery.rut.chileno.js")}}'></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#for_congregation_id').change(function () {
                const fieldsetName = $(this).val();

                if (fieldsetName.includes("10")) {
                    $('#for_congregation_other').attr("disabled", false);
                    $('#for_congregation_other').attr("required", true);
                } else {
                    $('#for_congregation_other').val('');
                    $('#for_congregation_other').attr("required", false);
                    $('#for_congregation_other').attr("disabled", true);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/defaults-es_CL.min.js') }}"></script>

@endsection
