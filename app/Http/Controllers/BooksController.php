<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    public function getBooks() {
//        $client = new Client();
//        $url = "http://localhost/gor-perpus/public/api/books";
//
//        $response = $client->request('GET', $url, [
//            'verify'  => false,
//        ]);
//
//        $responseBody = json_decode($response->getBody());

        $responseBody = DB::table('gorlib_buku')->orderBy('updated_at', 'desc')->get();

        return view('pages.collections', compact('responseBody'));
    }

    public function getBookDetail(Request $request) {
        $book = Books::where('id', $request->id)->first();
        return view('pages.book-detail', $book);
    }

    public function storeCollection() {
        return view('pages.add-collection');
    }

    public function storeCollectionDB(Request $request) {
        $validatedData = $request->validate([
            'judul_utama' => 'required|string|max:255',
            'pengarang_utama' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $books = new Books();

        if($request->file('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('assets/images'), $coverName);
            $books->cover = $coverName;
        }


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
        $books->save();


        return redirect()->route('collections')->with('success', 'Post created successfully');

    }

    public function updateCollection(Request $request) {
        $book = Books::where('id', $request->id)->first();
        return view('pages.update-collection', $book);
    }

}
