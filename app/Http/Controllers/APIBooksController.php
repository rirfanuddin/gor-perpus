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

    function saveBook() {

    }

    function updateBook(Request $request) {

    }

    function deleteBook() {

    }

}
