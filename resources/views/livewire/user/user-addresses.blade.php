<div>
    @foreach($addresses as $key => $value)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Dirección {{$key + 1}}</h5>
            <div class="form-row">

                <input type="hidden" name='address_id[]' wire:model='addresses.{{$key}}.id'>

                <fieldset class="form-group col-md-2">
                    <label for="for_address_type">Tipo *</label>
                    <select name="address_use[]" class="form-control" wire:model='addresses.{{$key}}.address_use' required
                        >
                        <option value=''></option>
                        <option value="home" selected>Casa</option>
                        <option value="work">Trabajo</option>
                        <option value="temp">Temporal</option>
                        <option value="old">Antiguo</option>
                        <option value="billing">Facturación</option>
                    </select>
                </fieldset>

                {{--                    <fieldset class="form-group col-md-3">--}}
                {{--                        <label for="for_streeNameType">Via de acceso</label>--}}
                {{--                        <select name="streeNameType[]" class="form-control">--}}
                {{--                            <option value="1">Calle</option>--}}
                {{--                            --}}{{--            @foreach($streetTypes as $type)--}}
                {{--                            --}}{{--                <option value="{{ $type['code'] }}">{{ $type['display'] }}
                </option>--}}
                {{--                            --}}{{--            @endforeach--}}
                {{--                        </select>--}}
                {{--                    </fieldset>--}}

                <fieldset class="form-group col-2">
                    <label for="for_street_name">Calle *</label>
                    <input type="text" class="form-control" name="street_name[]" value="{{old('street_name.1')}}"
                        wire:model='addresses.{{$key}}.street_name' required 
                        >
                </fieldset>

                <fieldset class="form-group col-md-2">
                    <label for="for_line">Número</label>
                    <input type="text" class="form-control" name="line[]"
                        wire:model='addresses.{{$key}}.line'
                        >
                </fieldset>

                <fieldset class="form-group col-md-2">
                    <label for="for_address_apartament">Depto</label>
                    <input type="text" class="form-control" name="address_apartment[]"
                        wire:model='addresses.{{$key}}.address_apartment'
                       >
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="for_poblacion">Población/Villa/Condominio</label>
                    <input type="text" class="form-control" name="suburb[]" wire:model='addresses.{{$key}}.suburb'
                       >
                </fieldset>

            </div>

            <div class="form-row">

                <fieldset class="form-group col-md-3">
                    <label for="for_state">Región *</label>
                    <select name="state[]" class="form-control" wire:model='addresses.{{$key}}.state'
                        wire:change='getCommunes({{$key}})' required>
                        <option value=""></option>
                        @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-3">
                    <label for="for_district">Comuna *</label>
                    <select name="district[]" class="form-control" wire:model='addresses.{{$key}}.commune' required>
                        <option value=""></option>

                        @if ($communes)
                            @foreach($communes as $commune)
                                <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                            @endforeach
                        @endif

                    </select>
                </fieldset>
                {{-- <fieldset class="form-group col-1">
                    <label for="for_latitud">Latitud</label>
                    <input type="text" class="form-control" name="latitud[]"
                        >
                </fieldset> --}}
                {{-- <fieldset class="form-group col-1">
                    <label for="for_longitud">Longitud</label>
                    <input type="text" class="form-control" name="longitud[]"
                        >
                </fieldset> --}}
                <fieldset class="form-group col-md-3">
                    <label for="for_city">Ciudad</label>
                    <input type="text" class="form-control" name="city[]" wire:model='addresses.{{$key}}.city'
                        >
                </fieldset>
                <fieldset class="form-group col-md-2">
                    <label for="for_country">País *</label>
                    <select name="country[]" class="form-control" wire:model='addresses.{{$key}}.country' required>
                        <option value=""></option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </fieldset>
                 <fieldset class=" form-group col-md-1">
                    <label for="for_id_dv">Predeterminado</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="1" {{ ( (isset($addresses[$key]) && isset($addresses[$key]["actually"]) && $addresses[$key]["actually"] == 1 )? "checked" : "" )}} name="actually[]"  >
                    </div>

                </fieldset>
                @if($key != 0)
                <fieldset class="form-group offset-4 col-1">
                    <label for=""></label>
                    <button class="btn btn-danger btn-block" wire:click.prevent="remove({{$key}})"> <i class="fa fa-minus" aria-hidden="true"></i> Remover
                    </button>
                </fieldset>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <div class="form-row">
        <div class="col">
            <button type="button" class="btn btn-primary" wire:click.prevent="add()"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar otra dirección</button>
        </div>
    </div>
</div>
