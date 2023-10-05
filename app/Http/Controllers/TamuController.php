<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    function index() {
        $responseBody = DB::table('tamu')->get();

        return view('pages.tamu', compact('responseBody'));
    }
}
