<div>
    @if($pageLock->locked_to > now() AND $pageLock->user_id != auth()->id())
        <div class="modal fade" id="pageLock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pageLockLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="pageLockLabel">
                            <i class="fas fa-exclamation-triangle"></i>
                            Página bloqueada por otro usuario
                        </h1>
                    </div>

                    <div class="modal-body">
                        <p class="fs-5">
                            Ésta página la tiene abierta <b>{{ $pageLock->user->text }}</b>. <br>
                            Si desea utilizarla, solicítele que la cierre.
                        </p>
                    </div>
                    
                    <div class="modal-footer text-center">
                        <p>Deberá esperar <b>{{ $time }}</b> segundos y luego recargar ésta página.</p>
                        <a class="btn btn-sm btn-primary" href="{{ request()->url() }}">Recargar</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.onload = () => {
                $('#pageLock').modal('show');
            }
        </script>
    @else
        <div wire:poll.keep-alive.{{ $time * 1000 }}ms='keepAlive'></div>
    @endif
</div>