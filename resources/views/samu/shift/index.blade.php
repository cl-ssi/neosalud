@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    <i class="fas fa-blender-phone"></i> Listado de turnos

    @if($openShift)
        <button class="btn btn-outline-success float-end" disabled readonly>
            <i class="fas fa-plus"></i> Hay un turno abierto
        </button>
    @else
        <a class="btn btn-success float-end" href="{{ route('samu.shift.create') }}">
            <i class="fas fa-plus"></i> Crear turno
        </a>
    @endif
</h3>

    @foreach($shifts as $shift)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr class="table-primary">
                        <th></th>
                        <th>Estado</th>
                        <th>Turno</th>
                        <th>Apertura</th>
                        <th>Cierre</th>
                        <th>Observación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2" nowrap>
                            <a href="{{ route('samu.shift.edit', $shift) }}">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> {{ $shift->id }}
                                </button>
                            </a>
                        </td>
                        <td>{{ $shift->statusInWord }} </td>
                        <td>{{ $shift->type }}</td>
                        <td nowrap>{{ $shift->opening_at->format('Y-m-d H:i') }}</td>
                        <td nowrap>{{ optional($shift->closing_at)->format('Y-m-d H:i') }}</td>
                        <td>
                            {{ $shift->observation }}
                        </td>
                        <td>
                            @if($shift->status AND $shift->users->isEmpty())
                            <form method="POST" action="{{ route('samu.shift.destroy', $shift) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5>
            Trabajadores
        </h5>

        <div class="mb-2">
            @if($shift->isOpening() AND auth()->user()->cannot('SAMU auditor') )
                @livewire('samu.shift-user', ['shift' => $shift])
            @else
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Funcionario</th>
                                <th>Tipo Trabajador</th>
                                <th>Asume</th>
                                <th>Se Retira</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shift->users as $user)
                                <tr>
                                    <td>
                                        {{ optional($user)->officialFullName }}
                                    </td>
                                    <td>
                                        {{ optional($user->pivot)->JobType->name }}
                                    </td>
                                    <td>
                                        {{ optional($user->pivot)->assumes_at }}
                                    </td>
                                    <td>
                                        {{ optional($user->pivot)->leaves_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    @endforeach

    {{ $shifts->links() }}

@endsection
