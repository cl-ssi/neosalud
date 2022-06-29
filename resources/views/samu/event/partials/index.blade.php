<div class="table-responsive">
    <table class="table table-sm">

        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>QTC</th>
                <th>Aviso</th>
                <th>Móvil en Servicio</th>
                <th>Dirección</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Observación</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($events as $event)
            <tr class="table-{{ $event->color }}">
                <td nowrap>
                    <a href="{{ route('samu.event.edit', $event) }}">
                            @if($event->status)
                                <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            @else
                                <button class="btn btn-sm btn-outline-success">
                                <i class="fas fa-eye"></i>
                            @endif
                            {{ $event->id }}
                            </button>
                    </a>
                    @if($event->trashed())
                    <br><span class="badge badge-danger">Eliminado</span>
                    @endif
                </td>
                <td>{{ $event->counter }} </td>
                <td nowrap>{{ optional($event->departure_at)->format('H:i') }}</td>
                <td nowrap>
                    {{ optional($event->mobile)->code }}
                    {{ optional($event->mobile)->name }}
                </td>
                <td>{{ $event->full_address }} {{ optional($event->commune)->name }}</td>
                <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                <td>{{ $event->observation }}</td>
                <td>
                    @if($btnDuplicate)
                    <a href="{{ route('samu.event.duplicate', $event) }}" title="Duplicar cometido" class="btn btn-sm btn-success">
                        <i class="far fa-copy"></i> Duplicar
                    </a>
                    @endif
                </td>
            </tr>
            <tr class="table-{{ $event->color }}">
                <td class="text-center">
                    <i class="fas fa-phone"></i>
                    <br>
                    <small>{{ $event->date->format('Y-m-d') }}</small>
                </td>
                <td colspan="9">
                    @if($event->call)
                        <li>
                            <a href="{{ route('samu.call.edit', $event->call) }}">{{ $event->call->id }}</a> -
                            {{ $event->call->sex_abbr }}
                            {{ $event->call->age_format }}
                            {{ $event->call->information }}
                        </li>
                        @foreach($event->call->associatedCalls as $associatedCall)
                            <li>
                                <a href="{{ route('samu.call.edit', $associatedCall) }}">{{ $associatedCall->id }}</a> -
                                {{ $associatedCall->sex_abbr }}
                                {{ $associatedCall->age_format }}
                                {{ $associatedCall->information }}
                            </li>
                        @endforeach
                    @else
                        <li>No hay llamadas asociadas</li>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="10"></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>