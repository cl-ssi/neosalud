@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h3 class="mb-3">Editar usuario: <strong> {{ $user->officialFullName }} </strong> </h3>

    @canany(['Administrator', 'Chagas: Administrador', 'Developer'])
        <form class="form-horizontal" method="POST" action="{{ route('user.update', $user) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Datos de usuario</h5>

                    <input type="hidden" name='human_name_use' value='official'>
                    <div class="form-row">

                        <fieldset class="form-group col-md-1">
                            <label for="for_run">Run*</label>
                            <input type="number" class="form-control" name="run" id="for_run" required readonly
                                value="{{ old('run', $user->identifierRun->value) }}">
                        </fieldset>
                        <fieldset class="form-group col-md-1">
                            <label for="for_dv">DV*</label>
                            <input type="text" class="form-control" name="dv" id="for_dv" readonly required readonly
                                value="{{ old('dv', $user->identifierRun->dv) }}">
                        </fieldset>

                        <fieldset class="form-group col-md-4">
                            <label for="for_given">Nombres *</label>
                            <input type="text" class="form-control" name="given" id="for_given" required
                                value="{{ old('given', $user->officialName) }}">
                        </fieldset>

                        <fieldset class="form-group col-md-3">
                            <label for="for_fathers_family">Apellido Paterno *</label>
                            <input type="text" class="form-control" name="fathers_family" id="for_fathers_family" required
                                value="{{ old('fathers_family', $user->officialFathersFamily) }}">
                        </fieldset>

                        <fieldset class="form-group col-md-3">
                            <label for="for_mothers_family">Apellido Materno</label>
                            <input type="text" class="form-control" name="mothers_family" id="for_mothers_family"
                                value="{{ old('mothers_family', $user->officialMothersFamily) }}">
                        </fieldset>

                        <fieldset class="form-group col-md-4">
                            <label for="for_organization">Organización *</label>
                            <select class="form-select select2" name="organization_id[]" id="for_organization" multiple
                                required>
                                <option value="">Seleccionar organización del Usuario</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}"
                                        {{ in_array($organization->id, old('organization_id', $user->practitioners->pluck('organization_id')->toArray())) ? 'selected' : '' }}>
                                        {{ $organization->alias }}</option>
                                @endforeach
                            </select>
                        </fieldset>


                        <fieldset class="form-group col-md-3">
                            <label for="for_social_name">Email laboral</label>
                            <input type="email" class="form-control" name="email" id="for_email"
                                value="{{ old('email', $user->officialEmail) }}">
                        </fieldset>

                        <fieldset class="form-group col-md-2">
                            <label for="for_social_name">Teléfono laboral</label>
                            <input type="number" class="form-control" name="phone" id="for_phone"
                                value="{{ old('phone', $user->officialPhone) }}">
                        </fieldset>

                        {{-- <fieldset class="form-group col-md-2">
                    <label for="for_social_name">Clave</label>
                    <input type="password" class="form-control" name="password" id="for_password"
                        value="{{old('password')}}"
                > --}}
                        </fieldset>

                    </div>

                </div>
            </div>


            <div class="form-row">
                <div class="col">
                    <h4>Permisos</h4>
                    @can('be god')
                        <div class="form-check">
                            <input type="hidden" name="permissions[be god]" value="false">
                            <input class="form-check-input" type="checkbox" name="permissions[be god]" value="true" id="be god"
                                {{ $user->can('be god') ? 'checked' : '' }}>
                            <label class="form-check-label" for="be god"><b>be god</b></label>
                        </div>
                    @endcan

                    @php $anterior = null; @endphp
                    @foreach ($permissions as $permission)
                        <input type="hidden" name="permissions[{{ $permission->name }}]" value="false">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[{{ $permission->name }}]"
                                value="true" id="{{ $permission->name }}"
                                {{ $user->can($permission->name) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $permission->name }}">
                                <b>{{ $permission->name }}</b> {{ $permission->description }}</label>
                        </div>
                    @endforeach
                    <hr>
                    <input type="submit" class="btn btn-primary mb-4" value="Guardar">
                </div>

            </div>

        </form>
    @endcanany

@endsection


@section('custom_js')
    <script src="{{ asset('js/jquery.rut.chileno.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.select2').select2();
            //obtiene digito verificador
            $('input[name=run]').keyup(function(e) {
                var str = $("#for_run").val();
                $('#for_dv').val($.rut.dv(str));
            });

        });
    </script>
@endsection