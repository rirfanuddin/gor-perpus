<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\PeminjamanBuku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class PeminjamanController extends Controller
{
    public function daftarPeminjaman() {
        $responseBody = DB::table('peminjaman_buku')
            ->join('gorlib_buku', 'peminjaman_buku.book_id', '=', 'gorlib_buku.id')
            ->join('users', 'peminjaman_buku.user_id', '=', 'users.id')
            ->select('users.name', 'peminjaman_buku.*', 'gorlib_buku.judul_utama', 'gorlib_buku.judul_tambahan')
            ->get();

        return view('pages.daftar-peminjaman', compact('responseBody'));
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

        $peminjamanBuku->book_id = $validatedData['book_id'];
        $peminjamanBuku->user_id = Auth::user()->id;

        $harus_kembali=new DateTime('now');
        $harus_kembali = $harus_kembali->add(new DateInterval('P3D'));

        $peminjamanBuku->tanggal_harus_kembali = $harus_kembali;
        $peminjamanBuku->status = 'DIPINJAM';
        $peminjamanBuku->save();

        return redirect()->route('collections')->with('success', 'Post created successfully');
    }

    public function detailPeminjaman(Request $request) {
        $responseBody = PeminjamanBuku::select("peminjaman_buku.*", "gorlib_buku.*")
            ->join("gorlib_buku", "gorlib_buku.id" , "=", "peminjaman_buku.book_id")
            ->where("peminjaman_buku.id", $request->id)
            ->first();

        return view('pages.detail-peminjaman', $responseBody);
    }
}
