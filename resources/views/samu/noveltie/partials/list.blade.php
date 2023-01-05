<div class="table-responsive mt-3">
    <table class="table table-sm">
        <thead>
            <tr class="table-primary">
                <th width="90"></th>
                <th width="100">Fecha</th>
                <th>Teléfono</th>
                <th>Detalle de Novedades</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody>
            @forelse($novelties as $noveltie)
            <tr wire:loading.class="text-muted">
                <td>
                    @if($noveltie->shift->status)
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('samu.noveltie.edit', $noveltie) }}">
                    <i class="fas fa-edit"></i> {{ $noveltie->id }} </a>
                    @endif
                </td>
                <td>{{ $noveltie->created_at }}</td>
                <td>{{ $noveltie->telephone }}</td>
                <td>{{ $noveltie->detail ?? '' }} </td>
                <td>{{ $noveltie->creator->officialFullName }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="h4 text-bg-info text-center">No se encontraron resultados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
