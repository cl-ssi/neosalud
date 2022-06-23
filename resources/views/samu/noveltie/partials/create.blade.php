<form method="POST" action="{{ route('samu.noveltie.store') }}">
    @csrf
    @method('POST')

    @include('samu.noveltie.partials.form', [
        'noveltie' => null
    ])

    <br>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary float-end ms-1">Cancelar</a>
    <button type="submit" class="btn btn-primary float-end">Guardar</button>

    <br>
</form>
