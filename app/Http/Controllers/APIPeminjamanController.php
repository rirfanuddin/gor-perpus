<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIPeminjamanController extends Controller
{
    public function createPeminjaman(Request $request) {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
        ]);

        $jumlah_peminjaman_belum_kembali = PeminjamanBuku::where('user_id', $validatedData['user_id'])
            ->where('tanggal_kembali', null)
            ->count();

        if($jumlah_peminjaman_belum_kembali >= 3) {
            return response()->json([
                'status' => 'Failed, more than 3'
            ]);
        } else {
            $peminjamanBuku = new PeminjamanBuku();

            $peminjamanBuku->book_id = $validatedData['book_id'];
            $peminjamanBuku->user_id = $validatedData['user_id'];

            $harus_kembali=Date('y:m:d', strtotime('+14 days'));

            $peminjamanBuku->tanggal_harus_kembali = $harus_kembali;
            $peminjamanBuku->status = 'DIPINJAM';
            $peminjamanBuku->save();

            return response()->json([
                'status' => 'Success'
            ]);
        }
    }

    public function getUserId() {
        return response()->json([
            'user_id' => Auth::user()->id
        ]);
    }
}
