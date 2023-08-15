<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HalamanUtamaController extends Controller
{
    public function getBooks() {
        $client = new Client();
        $url = "http://localhost/gor-perpus/public/api/books";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('halaman-utama', compact('responseBody'));
    }
}
