<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showJSON($body) {
        $json = json_decode($body, true);
        if ($json != null) {
            return $json;
        } else {
            $hasil = preg_replace("/\":\s*([a-zA-Z0-9_]+)/", "\":\"$1\"", $body);
            $json = json_decode($hasil, true);
            return $json;
        }
    }

    public function client($url) {
        $client = new Client([
            'base_uri' => $url
        ]);
        return $client;
    }
}
