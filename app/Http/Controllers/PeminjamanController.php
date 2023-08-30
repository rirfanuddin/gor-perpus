<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
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

    public function createPeminjamanDB(Request $request) {
        $validatedData = $request->validate([
            'book_id' => 'required',
        ]);

        $peminjamanBuku = new PeminjamanBuku();

        $peminjamanBuku->user_id = Auth::user()->id;
        $peminjamanBuku->book_id = $validatedData['user_id'];

        $harus_kembali=Date('y:m:d', strtotime('+3 days'));

        $peminjamanBuku->tanggal_harus_kembali = $harus_kembali;
        $peminjamanBuku->status = 'DIPINJAM';
        $peminjamanBuku->save();

        return redirect()->route('collections')->with('success', 'Post created successfully');
    }
}
