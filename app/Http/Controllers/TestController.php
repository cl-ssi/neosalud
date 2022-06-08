<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function sendIp()
    {

        $client = new Client(['base_uri' => "https://i.saludiquique.cl/" ]);
        $headers = array();
        $response = $client->request('GET', "test-getip", $headers);
        echo "get content: ";
        return $response->getBody();
    }

    public function error($option = null)
    {
        switch($option)
        {
            case 1:
                return redirect()->route('ruta.inexistente');
                break;
            case 2:
                abort(500,"Error 500.000");
                break;
            case 3:
                echo "Log: boom";
                Log::info('Boom '.$option);
                break;
        }
    }

    public function getProjectId()
    {
        echo env('GOOGLE_PROJECT_ID');
    }
}
