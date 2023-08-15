<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class APIBooksController extends Controller
{
    function getAllBooks() {
        $data = DB::table('gorlib_buku')->get();
        return $data;
    }

    function saveBook(Request $request) {
        $validatedData = $request->validate([
            'judul_utama' => 'required|string|max:255',
            'pengarang_utama' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cover = $request->file('cover');
        $coverName = time() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('assets/images'), $coverName);

        $books = new Books();
        $books->id = Str::uuid();
        $books->judul_utama = $validatedData['judul_utama'];
        $books->judul_tambahan = $request->judul_tambahan;
        $books->pengarang_utama = $validatedData['pengarang_utama'];
        $books->pengarang_tambahan = $request->pengarang_tambahan;
        $books->penerbit = $request->penerbit;
        $books->kota_terbit = $request->kota_terbit;
        $books->tahun_terbit = $request->tahun_terbit;
        $books->bukti_fisik_romawi = $request->bukti_fisik_romawi;
        $books->bukti_fisik_halaman = $request->bukti_fisik_halaman;
        $books->bukti_fisik_tebal = $request->bukti_fisik_tebal;
        $books->isbn = $request->isbn;
        $books->subyek = $request->subyek;
        $books->jenis_koleksi = $request->jenis_koleksi;
        $books->bahasa = $request->bahasa;
        $books->cover = $coverName;
        $books->save();

        return response()->json([
            'message' => 'Book created successfully.',
            'book' => $books
        ], 201);
    }

    function updateBook(Request $request) {

    }

    function deleteBook() {

    }

}
