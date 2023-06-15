<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BooksController extends Controller
{
    public function getBooks() {
        $client = new Client();
        $url = "http://localhost/gor-perpus/public/api/books";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('pages.collections', compact('responseBody'));
    }

    public function storeCollection() {
        return view('pages.add-collection');
    }

}
