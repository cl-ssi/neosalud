<div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Fecha y Hora</th>
                    <th>F. Cardíaca</th>
                    <th>F. Respiratoria</th>
                    <th>Presión Arterial</th>
                    <th>Presión Arterial Media</th>
                    <th>Glasgow</th>
                    <th>% Sat. Oxígeno/Ambi.</th>
                    <th>% Sat. Oxígeno/Apoyo</th>
                    <th>HGT mg/dl</th>
                    <th>Llene capilar</th>
                    <th>Temperatura °C</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vitalSigns as $index => $vitalSign)
                <tr class="text-center">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $vitalSign['registered_at_format'] ? $vitalSign['registered_at_format'] : '-' }}</td>
                    <td>{{ $vitalSign['fc'] ? $vitalSign['fc'] : '-' }}</td>
                    <td>{{ $vitalSign['fr'] ? $vitalSign['fr'] : '-' }}</td>
                    <td>{{ $vitalSign['pa'] ? $vitalSign['pa'] : '-' }}</td>
                    <td>{{ $vitalSign['pam'] ? $vitalSign['pam'] : '-'}}</td>
                    <td>{{ $vitalSign['gl'] ? $vitalSign['gl'] : '-' }}</td>
                    <td>{{ $vitalSign['soam'] ? $vitalSign['soam'] : '-'}}</td>
                    <td>{{ $vitalSign['soap'] ? $vitalSign['soap'] : '-'}}</td>
                    <td>{{ $vitalSign['hgt'] ? $vitalSign['hgt'] : '-'}}</td>
                    <td>{{ $vitalSign['fill_capillary'] ? $vitalSign['fill_capillary'] : '-'}}</td>
                    <td>{{ $vitalSign['t'] ? $vitalSign['t'] : '-'}}</td>
                    <td nowrap>
                        <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            title="Editar Signo Vital"
                            wire:click="editVitalSign({{ $index }})"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button
                            type="button"
                            class="btn btn-sm btn-danger"
                            title="Elimina Signo Vital"
                            wire:click="deleteVitalSign({{ $index }})"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="13">
                        <em>No hay signos vitales</em>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @foreach($vitalSigns as $vitalSign)
            <input type="hidden" name="ids[]" class="form-control" value="{{ $vitalSign['id'] }}"/>
            <input type="hidden" name="registered_at[]" class="form-control" value="{{ $vitalSign['registered_at'] }}"/>
            <input type="hidden" name="fc[]" class="form-control" value="{{ $vitalSign['fc'] }}"/>
            <input type="hidden" name="fr[]" class="form-control" value="{{ $vitalSign['fr'] }}"/>
            <input type="hidden" name="pa[]" class="form-control" value="{{ $vitalSign['pa'] }}"/>
            <input type="hidden" name="pam[]" class="form-control" value="{{ $vitalSign['pam'] }}"/>
            <input type="hidden" name="gl[]" class="form-control" value="{{ $vitalSign['gl'] }}"/>
            <input type="hidden" name="soam[]" class="form-control" value="{{ $vitalSign['soam'] }}"/>
            <input type="hidden" name="soap[]" class="form-control" value="{{ $vitalSign['soap'] }}"/>
            <input type="hidden" name="hgt[]" class="form-control" value="{{ $vitalSign['hgt'] }}"/>
            <input type="hidden" name="fill_capillary[]" class="form-control" value="{{ $vitalSign['fill_capillary'] }}"/>
            <input type="hidden" name="t[]" class="form-control" value="{{ $vitalSign['t'] }}"/>
        @endforeach
    </div>
</div>
