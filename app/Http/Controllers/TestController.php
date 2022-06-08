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
        Log::info('Boom '.$option);
        //abort(500, "The Partner was not found");
        echo "Echo error";
        if($option == 1)
        {
            return redirect()->route('asdfsdf');
        }
        if($option == 2)
        {
            abort(404);
        }
    }

    public function getProjectId()
    {
        echo env('GOOGLE_PROJECT_ID');
    }
}
