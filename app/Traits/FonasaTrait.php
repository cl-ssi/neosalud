<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait FonasaTrait
{
    public function fonasa($run, $dv)
    {
        /* Antes: Si se le envió el run y el dv por GET
          Ahora: Envío el componente RUN de Livewire */

        if (!$run || !$dv) {
            return json_encode("Debe incluir run y dv");
        }

        $urlWs = env('FONASA_WS_URL');
        $response = Http::get($urlWs, ['run' => $this->run, 'dv' => $this->dv]);

        if ($response->failed()) {
            return json_encode("No se pudo conectar a FONASA: " . $response->reason());
        }

        return $response->body();
    }
}
