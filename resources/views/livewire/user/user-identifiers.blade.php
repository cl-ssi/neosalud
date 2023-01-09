<div>
    @foreach($identifiers as $key => $value)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Identificador {{$key + 1}}</h5>

            <input type="hidden" name='identifier_id[]' wire:model='identifiers.{{$key}}.id'>
            <div class="row">
                <fieldset class="form-group col-md-2">
                    <label for="for_id_type">Tipo de identificación *</label>
                    <select name="id_type[]" class="form-control" wire:model='identifiers.{{$key}}.id_type'  required>
                        @foreach($identifierTypes as $identifierType)
                        <option value="{{ $identifierType->id }}">{{ $identifierType->text }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="for_id_value">Número *</label>
                    <input type="text" class="form-control" name="id_value[]" wire:model.lazy='identifiers.{{$key}}.value' wire:change="setDv({{$key}})" required
                        >
                </fieldset>

                <fieldset class=" form-group col-md-1">
                    <label for="for_id_dv">DV</label>
                    <input type="text" class="form-control" name="id_dv[]"
                          wire:model='identifiers.{{$key}}.dv'
                        {{ ($identifiers[$key]['id_type'] == 1 ? 'readonly' : '')}}
                        >
                </fieldset>

                <fieldset class="form-group col-md-3">
                    <label for="for_id_use">Uso *</label>
                    <select name="id_use[]" class="form-control" wire:model='identifiers.{{$key}}.use' required>
                        <option value="official">Oficial</option>
                        <option value="temp">Temporal</option>
                        <option value="usual">Usual</option>
                        <option value="secondary">Secundario</option>
                        <option value="old">Antiguo</option>
                    </select>
                </fieldset>


                @if($patient)
                    <fieldset class=" form-group col-md-2">
                        <label for="for_created_at">Fecha creación</label>
                        @if( array_key_exists('created_at', $identifiers[$key]))
                            <input type="text" class="form-control" name="created_at[]" readonly
                                   value="{{$identifiers[$key]['created_at']}}">
                            @endif
                    </fieldset>
                @endif


            </div>

            <div class="row">
                @if($key != 0)
                <fieldset class="form-group offset-5 col-1">
                    <label for=""></label>
                    <button class="btn btn-danger btn-block" wire:click.prevent="remove({{$key}})"> <i class="fa fa-minus" aria-hidden="true"></i> Remover
                    </button>
                </fieldset>
                @endif
            </div>

        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar otro
                identificador</button>
        </div>
   </div>
</div>
