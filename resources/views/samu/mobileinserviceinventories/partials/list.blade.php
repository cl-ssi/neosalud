<button type="button" class="btn btn-sm btn-warning"><i class="fa-solid fa-list"></i></button> Pendiente
<button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-list"></i></button> Inventariado
<button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-list"></i></button> Aprobado
<hr>

@foreach($mobilesInService->reverse() as $mis)
<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th width="15%">Movil</th>
                <th width="15%">Posición</th>
                <th width="15%">Tipo</th>
                <th>Estado</th>
                <th>O2 central</th>
                <th>Observación</th>
                <th></th>
            </tr>

            <tr>
                <td><b>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</b></td>
                <td>{{ $mis->position }}</td>
                <td>{{ optional($mis->type)->name }}</td>
                <td>{{ $mis->status ? 'Activo' : 'Inactivo'  }}</td>
                <td>{{ $mis->o2 }}</td>
                <td>{{ $mis->observation }}</td>
                <td width="50">
                    @if($mis->shift->status)
                        @if(!$mis->inventory)
                            <form method="GET" action="{{ route('samu.mobileinserviceinventory.details.create' , $mis) }}">
                                <button type="submit" class="btn btn-sm btn-warning"><i class="fa-solid fa-list"></i></button>
                            </form>
                        @else
                            @if($mis->inventory->approbation_date)
                                <form method="GET" action="{{ route('samu.mobileinserviceinventory.details.edit' , $mis) }}">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-list"></i></button>
                                </form>
                            @else
                                <form method="GET" action="{{ route('samu.mobileinserviceinventory.details.edit' , $mis) }}">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-list"></i></button>
                                </form>
                            @endif
                        @endif
                    @endif
                </td>
            
            </tr>
        </tbody>
    </table>
</div>

<br>

@endforeach