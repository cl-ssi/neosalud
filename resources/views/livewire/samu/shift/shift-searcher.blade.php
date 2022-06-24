<div>
    @include('samu.nav')

    <div class="row">
        <div class="col">
            <h3>
                <i class="fas fa-blender-phone"></i> Buscador Turnos
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label class="form-label" for="for-date">Fecha</label>
            <input class="form-control"
                type="date"
                id="for-date"
                autocomplete="off"
                wire:model="date">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Estatus</th>
                            <th>Tipo</th>
                            <th>Apertura</th>
                            <th>Cierre</th>
                            <th>Creador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shifts as $shift)
                            <tr class="table-active"  wire:loading.remove>
                                <td>{{ $shift->id }}</td>
                                <td>{{ $shift->status_in_word }}</td>
                                <td>{{ $shift->type }}</td>
                                <td>{{ $shift->opening_at_format }}</td>
                                <td>{{ $shift->closing_at_format }}</td>
                                <td>{{ $shift->creator->official_name }}</td>
                            </tr>
                            <tr  wire:loading.remove>
                                <td colspan="6">
                                    Observacion: {{ $shift->observation }}
                                </td>
                            </tr>
                            <tr wire:loading.remove>
                                <td colspan="3">
                                    <span>Personal de turno:</span>
                                    <br>
                                    @foreach($shift->users as $user)
                                        <li>
                                            {{ optional($user)->officialFullName }}
                                            -
                                            {{ optional($user->pivot)->JobType->name }}
                                        </li>
                                    @endforeach
                                </td>
                                <td colspan="3">
                                    <span>Móviles de turno:</span>
                                    <br>
                                    @foreach($shift->mobilesInService as $mis)
                                    <li>
                                        {{ optional($mis->mobile)->code }}
                                        {{ optional($mis->mobile)->name }}
                                        - Tipo {{ $mis->type }}
                                        <br>
                                        <span class="pl-4">Tripulación:</span>
                                        <br>
                                        @foreach($mis->crew as $tripulant)
                                        <li class="pl-4" style="list-style-type: circle;">
                                            {{ $tripulant->officialFullName }}
                                        </li>
                                        @endforeach
                                    </li>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                        <tr class="text-center" wire:loading.remove>
                            <td colspan="6">
                                <em>No hay resultados</em>
                            </td>
                        </tr>
                        @endforelse
                        <caption>
                            Total de resultados: {{ $shifts->count() }}
                        </caption>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
