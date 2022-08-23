<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebServiceController extends Controller
{
    public function fonasa(Request $request)
    {
        /* Si se le envió el run y el dv por GET */
        if (!$request->has('run') or !$request->has('dv')) {
            return json_encode("Debe incluir run y dv");
        }

        $urlWs = env('FONASA_WS_URL');
        $response = Http::get($urlWs, ['run' => $request->run, 'dv' => $request->dv]);

        if ($response->failed()) {
            return json_encode("No se pudo conectar a FONASA: " . $response->reason());
        }

        return $response->body();
    }
}
