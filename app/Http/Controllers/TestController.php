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

    public function error()
    {
        Log::info('Boom');
        abort(500, "The Partner was not found");
    }

    public function getProjectId()
    {
        echo getenv('GOOGLE_PROJECT_ID');
    }
}
