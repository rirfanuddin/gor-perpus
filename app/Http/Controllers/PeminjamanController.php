<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function daftarPeminjaman() {
        return view('pages.daftar-peminjaman');
    }

    public function createPeminjaman() {
        $responseBody = DB::table('gorlib_buku')->orderBy('judul_utama', 'desc')->get();

        return view('pages.add-peminjaman', compact('responseBody'));
    }
}
