<div class="table-responsive mb-3">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>ID</th>
                <th>Clasificación</th>
                <th nowrap>Hora</th>
                <th>Solicitante</th>
                <th>Información telefonica</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Receptor de llamada</th>
                <th>Triage</th>
                @if($createEvent)
                <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($calls as $call)
            <tr>
                <td class="text-center" nowrap>
                    @if($edit)
                    <a href="{{ route('samu.call.edit', $call) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> {{ $call->id }}
                    </a>
                    @else
                    {{ $call->id }}
                    @endif
                    @if($call->trashed())
                    <br><span class="badge badge-danger">Eliminada</span>
                    @endif
                </td>
                <td>
                    @if($call->classification)
                    {{ $call->classification }}
                    @if($call->classification != 'OT')
                    <br> Evento:
                    @foreach($call->events as $event)
                    <a href="{{ route('samu.event.edit', $event) }}" class="link-primary">
                        {{ $event->id }}
                    </a>,
                    @endforeach
                    @endif
                    @endif
                    @if($call->referenceCall)
                    Referencia: <a href="{{ route('samu.call.edit', $call->referenceCall) }}">
                        {{ $call->referenceCall->id }}
                    </a>
                    @endif
                </td>
                <td width="90">{{ $call->hour->format('d-m-Y H:i:s') }}</td>
                <td>{{ $call->applicant }}</td>
                <td>
                    {{ $call->sex_abbr }}
                    {{ $call->age_format }}
                    {{ $call->information }}
                </td>
                <td>
                    {{ $call->full_address }} {{ optional($call->commune)->name }}
                </td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>
                @if($call->triage)
                <td style="background-color: {{$call->triageColor[0]}} !important" class="{{$call->triageColor[1]}}">
                    <b>{{ strtoupper ($call->triage) }}</b>
                    <br>
                    @if ($call->triage == 'r1' || $call->triage == 'r2')
                    Crítico
                    @else
                    No Crítico
                    @endif
                    @else
                <td>

                    <form method="post" action="{{ route('samu.event.call.update.triage', $call) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-auto">
                            <select class="form-control" name="type" id="type">
                                <option value="" selected>Seleccionar</option>
                                <option value="r1">R1 - Crítico</option>
                                <option value="r2">R2 - Crítico</option>
                                <option value="r3">R3 - No Crítico</option>
                                <option value="r4">R4 - No Crítico</option>
                            </select>
                        </div>
                        <div class="col-auto text-center pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        </div>
                    </form>
                    @endif
                </td>
                @if($createEvent)
                <td class="text-center">
                    <a href="{{ route('samu.event.create', $call) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> Cometido
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>