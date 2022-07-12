@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row g-2">
    <div class="col-12 col-md-10">
        <h3 class="mb-3">
            <i class="fas fa-car-crash"></i> Editar cometido {{ $event->id }}
            @if($event->call)
                - Llamada ID: {{ $event->call->id }}
            @else
                - Sin llamada asociada
            @endif
        </h3>
    </div>
    <div class="col-12 col-md-2 text-end">
        @can('SAMU administrador','SAMU regulador')
            @if($event->status AND !$event->trashed())
            <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Cometido">
                    <i class="fas fa-trash"></i> Eliminar Cometido
                </button>
            </form>
            @endif
        @endcan
    </div>
</div>

@include('samu.call.partials.associated-calls', ['call' => $event->call])

@if($event->status)
<form method="post" action="{{ route('samu.event.update', $event) }}">
@endif

    @csrf
    @method('PUT')

    @include('samu.event.form', [
        'call'              => null,
        'event'             => $event,
        'keys'              => $keys,
        'shift'             => $shift,
        'inputType'         => $inputType,
        'timestampFormat'   => $timestampFormat,
    ])

    <br>

    @if($event->status)
        <button type="submit" name="btn_save" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>

        <button type="submit" name="btn_save_close" id="btn_save_close" class="btn btn-success float-end">
            <i class="fas fa-lock"></i> Guardar y cerrar
        </button>

        <input type="hidden" id="save_close" name="save_close" value="no">
    @else
        @can('SAMU administrador')
            <a class="btn btn-secondary" target="_blank"  href="{{ route('samu.event.report',$event) }}">
                <i class="fas fa-print"></i> Imprimir
            </a>
            @if( $event->created_at->gt(now()->subDays(90)) )
            <a class="btn btn-warning float-end" href="{{ route('samu.event.reopen',$event) }}">
                <i class="fas fa-lock-open"></i> Reabrir < 90 días
            </a>
            @endif
        @endcan
    @endif

    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">Cancelar</a>

@if($event->status)
</form>
@endif

<hr>


@canany(['SAMU'])
    @include('partials.short_audit', ['audits' => $event->audits] )
@endcanany


@endsection

@section('custom_js')
    <script>
        $("#btn_save_close").click(function(event) {
            var question = '¿Está seguro que desea guardar y cerrar el cometido?';
            var answer = window.confirm(question);

            if (answer) {
                $('#save_close').val("yes");
            }
        });
    </script>

    <script>
        function showContent() {
            element = document.getElementById("content");
            check = document.getElementById("patient-unknown");
            if (check.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    </script>

    <script>
        // document.getElementById("for_run").disabled = true;
        // document.getElementById("for_fonasa_button").disabled = true;
        // document.getElementById("for_patient_identification").disabled = true;
        // document.getElementById("for-patient-full-name").disabled = true;

        function showIdentifierField() {
            // var selected = document.getElementById("for-identifier-type").value;
            //
            // if (selected == 1) {
            //     document.getElementById("for_run").disabled = false;
            //     document.getElementById("for_fonasa_button").disabled = false;
            //
            //     document.getElementById("for_patient_identification").disabled = true;
            //     document.getElementById("for_patient_identification").value = '';
            //
            //     document.getElementById("for-patient-full-name").disabled = true;
            //     document.getElementById("for-patient-full-name").value = '';
            // }
            // else if (selected == "") {
            //     document.getElementById("for_run").disabled = true;
            //     document.getElementById("for_fonasa_button").disabled = true;
            //     document.getElementById("for_patient_identification").disabled = true;
            //     document.getElementById("for-patient-full-name").disabled = true;
            // }
            // else {
            //     document.getElementById("for_run").disabled = true;
            //     document.getElementById("for_fonasa_button").disabled = true;
            //
            //     document.getElementById("for_patient_identification").disabled = false;
            //     document.getElementById("for_patient_identification").value = '';
            //
            //     document.getElementById("for-patient-full-name").disabled = false;
            //     document.getElementById("for-patient-full-name").value = '';
            // }
        }
    </script>
@endsection
