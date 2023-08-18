<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HalamanUtamaController extends Controller
{
    public function getBooks() {
        $responseBody = DB::table('gorlib_buku')->orderBy('updated_at', 'desc')->get();

        return view('halaman-utama', compact('responseBody'));
    }
}
