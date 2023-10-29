<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\PeminjamanBuku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class PeminjamanController extends Controller
{
    public function daftarPeminjaman() {
        if(Auth::user()->role === 'user') {
            $responseBody = DB::table('peminjaman_buku')
                ->join('gorlib_buku', 'peminjaman_buku.book_id', '=', 'gorlib_buku.id')
                ->join('users', 'peminjaman_buku.user_id', '=', 'users.id')
                ->orderBy('created_at', 'desc')
                ->select('users.name', 'peminjaman_buku.*', 'gorlib_buku.judul_utama', 'gorlib_buku.judul_tambahan')
                ->where('user_id', Auth::user()->id)
                ->get();
        } else if (Auth::user()->role === 'admin') {
            $responseBody = DB::table('peminjaman_buku')
                ->join('gorlib_buku', 'peminjaman_buku.book_id', '=', 'gorlib_buku.id')
                ->join('users', 'peminjaman_buku.user_id', '=', 'users.id')
                ->orderBy('created_at', 'desc')
                ->select('users.name', 'users.phone_no', 'peminjaman_buku.*', 'gorlib_buku.judul_utama', 'gorlib_buku.judul_tambahan')
                ->get();
        } else if(Auth::user()->role === 'pimpinan') {
            $responseBody = DB::table('peminjaman_buku')
                ->join('gorlib_buku', 'peminjaman_buku.book_id', '=', 'gorlib_buku.id')
                ->join('users', 'peminjaman_buku.user_id', '=', 'users.id')
                ->orderBy('created_at', 'desc')
                ->select('users.name', 'peminjaman_buku.*', 'gorlib_buku.judul_utama', 'gorlib_buku.judul_tambahan')
                ->get();
        }

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
        $responseBody = PeminjamanBuku::select("gorlib_buku.*", "peminjaman_buku.id as peminjaman_id", "peminjaman_buku.tanggal_harus_kembali", "peminjaman_buku.status",
        "peminjaman_buku.tanggal_kembali", "peminjaman_buku.created_at as tanggal_pinjam", "users.*")
            ->join("gorlib_buku", "gorlib_buku.id" , "=", "peminjaman_buku.book_id")
            ->join("users", "users.id" , "=", "peminjaman_buku.user_id")
            ->where("peminjaman_buku.id", $request->id)
            ->first();

        return view('pages.detail-peminjaman', $responseBody);
    }

    public function deletePeminjaman(Request $request, $id) {
        $data = PeminjamanBuku::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('daftar.peminjaman')->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->route('daftar.peminjaman')->with('error', 'Data tidak ditemukan.');
    }

    public function pengembalian(Request $request, $id) {
        $data = PeminjamanBuku::find($id);
        if($data) {
            $data->status = "DIKEMBALIKAN";
            $data->tanggal_kembali = Carbon::now();
            $data->updated_at = Carbon::now();
            $data->update();
            return redirect()->route('detail.peminjaman', $id)->with('success', 'Data berhasil dikembalikan.');
        }
        return redirect()->route('daftar.peminjaman')->with('error', 'Gagal mengambalikan');
    }
}
