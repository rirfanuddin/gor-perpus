<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\PeminjamanBuku;
use App\Models\Tamu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $data = User::where('id', Auth::user()->id)->first();
        $jumlah_buku = Books::count();
        $jumlah_tamu = Tamu::count();
        $jumlah_peminjaman = PeminjamanBuku::count();
        $jumlah_sedang_dipinjam = PeminjamanBuku::where('tanggal_kembali', null)->count();
        $tamu_terakhir = Tamu::orderBy('created_at', 'desc')->take(5)->get();
        $peminjaman_on_progres = $responseBody = DB::table('peminjaman_buku')
            ->join('gorlib_buku', 'peminjaman_buku.book_id', '=', 'gorlib_buku.id')
            ->join('users', 'peminjaman_buku.user_id', '=', 'users.id')
            ->select('users.name', 'users.phone_no', 'peminjaman_buku.*', 'gorlib_buku.judul_utama', 'gorlib_buku.judul_tambahan')
            ->where('peminjaman_buku.tanggal_kembali', null)
            ->take(5)
            ->get();

        $data->jumlah_buku = $jumlah_buku;
        $data->jumlah_tamu = $jumlah_tamu;
        $data->jumlah_peminjaman = $jumlah_peminjaman;
        $data->jumlah_sedang_dipinjam = $jumlah_sedang_dipinjam;
        $data->tamu_terakhir = $tamu_terakhir;
        $data->peminjaman_on_progres = $peminjaman_on_progres;
        return view('dashboard')->with('data', $data);
    }

    public function getDashboardTamu() {
        // Dapatkan tanggal sekarang
        $today = Carbon::now();

        // Tentukan bulan dan tahun mulai
        $startMonth = $today->month + 1; // 11
        $startYear = $today->year - 1; // 2022

        // Inisialisasi data bulan dan jumlah peminjaman
        $bulan = [];
        $data = [];
        $max = 0;

        for ($i = 1; $i <= 12; $i++) {
            // Format bulan dengan 3 huruf (Jan, Feb, Mar, dst.)
            $bulan[] = $today->month($startMonth)->format('M');

            // Query database untuk mengambil jumlah peminjaman
            $jumlahPeminjaman = Tamu::whereYear('created_at', $startYear)
                ->whereMonth('created_at', $startMonth)
                ->count();

            if($max < $jumlahPeminjaman) {
                $max = $jumlahPeminjaman;
            }

            $startMonth++;
            if($startMonth > 12) {
                $startYear++;
                $startMonth = 1;
            }

            $data[] = $jumlahPeminjaman;
        }

        // Format data sebagai respons JSON
        $responseData = [
            'bulan' => $bulan,
            'data' => $data,
            'max' => round($max * 1.5)
        ];

        return response()->json($responseData);
    }

    public function getDashboardPeminjaman() {
        // Dapatkan tanggal sekarang
        $today = Carbon::now();

        // Tentukan bulan dan tahun mulai
        $startMonth = $today->month + 1; // 11
        $startYear = $today->year - 1; // 2022

        // Inisialisasi data bulan dan jumlah peminjaman
        $bulan = [];
        $data = [];
        $max = 0;

        for ($i = 1; $i <= 12; $i++) {
            // Format bulan dengan 3 huruf (Jan, Feb, Mar, dst.)
            $bulan[] = $today->month($startMonth)->format('M');

            // Query database untuk mengambil jumlah peminjaman
            $jumlahPeminjaman = PeminjamanBuku::whereYear('created_at', $startYear)
                ->whereMonth('created_at', $startMonth)
                ->count();

            if($max < $jumlahPeminjaman) {
                $max = $jumlahPeminjaman;
            }

            $startMonth++;
            if($startMonth > 12) {
                $startYear++;
                $startMonth = 1;
            }

            $data[] = $jumlahPeminjaman;
        }

        // Format data sebagai respons JSON
        $responseData = [
            'bulan' => $bulan,
            'data' => $data,
            'max' => round($max * 1.5)
        ];

        return response()->json($responseData);
    }

}
