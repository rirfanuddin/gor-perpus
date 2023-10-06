<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    function index() {
        $responseBody = DB::table('tamu')->get();

        return view('pages.tamu', compact('responseBody'));
    }

    function storeTamu(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'asal_instansi' => 'required|string|max:255',
        ]);

        $tamu = new Tamu();
        $tamu->name = $validatedData['name'];
        $tamu->phone_no = $validatedData['phone_no'];
        $tamu->asal_instansi = $validatedData['asal_instansi'];
        $tamu->save();

        return response()->json(['message' => 'Data tamu berhasil disimpan!']);
    }
}
