<div class="table-responsive d-print-none">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>Asociar</th>
                <th>Clasificación</th>
                <th nowrap>Hora</th>
                <th>Solicitante</th>
                <th>Información telefonica</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Receptor de llamada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shift->calls->where('classification','<>','OT')
                ->where('id','<>',$currentCall->id)
                ->whereNull('call_id')
                ->whereNotNull('classification')
                ->sortByDesc('id')
                    as $call)
            <tr>
                <td class="text-center" nowrap>
                    @if(!$currentCall->call_id)
                        <button class="btn btn-sm btn-success" wire:click="associate({{ $call->id }})">Asociar a {{ $call->id }}</button>
                    @elseif($currentCall->call_id == $call->id)
                        <button class="btn btn-sm btn-info" disabled>Asociado a {{ $call->id }}</button>
                        @can('SAMU regulador')
                            <button class="btn btn-sm btn-outline-danger" wire:click="disassociate()">
                                Desasociar</button>
                        @endcan
                    @else
                        {{ $call->id }}
                    @endif
                </td>
                <td>
                    @if($call->classification)
                        {{ $call->classification }}
                        @if($call->classification != 'OT')
                            <br> Evento:
                            @foreach($call->events as $event)
                                <a href="{{ route('samu.event.edit', $event) }}" class="link-primary"> {{ $event->id }}</a>,
                            @endforeach
                        @endif
                    @endif
                    @if($call->referenceCall)
                        Referencia: <a href="{{ route('samu.call.edit',$call->referenceCall) }}">{{ $call->referenceCall->id }}</a>
                    @endif
                </td>
                <td width="90">{{ $call->hour }}</td>
                <td>{{ $call->applicant }}</td>
                <td>
                    {{ $call->sex_abbr }}
                    {{ $call->age_format }}
                    {{ $call->information }}
                </td>
                <td>{{ $call->full_address }} {{ optional($call->commune)->name }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>