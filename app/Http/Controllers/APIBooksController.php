<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class APIBooksController extends Controller
{
    function getAllBooks() {
        $data = Books::get();
        return $data;
    }

    function saveBook(Request $request) {
        $validatedData = $request->validate([
            'judul_utama' => 'required|string|max:255',
            'judul_tambahan' => 'required|string|max:255',
            'pengarang_utama' => 'required|string|max:255',
            'pengarang_tambahan' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kota_terbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|string',
            'bukti_fisik_romawi' => 'required|string',
            'bukti_fisik_halaman' => 'required|string',
            'bukti_fisik_tebal' => 'required|string',
            'isbn' => 'required|string',
            'bahasa' => 'required|string',
            'subyek' => 'required|string',
            'jenis_koleksi' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cover = $request->file('cover');
        $coverName = time() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('images'), $coverName);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->image = $coverName;
        $post->save();

        return response()->json([
            'message' => 'Post created successfully.',
            'post' => $post
        ], 201);
    }

    function updateBook(Request $request) {

    }

    function deleteBook() {

    }

}
