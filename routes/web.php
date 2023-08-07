<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, "index"]);

Route::get('/collections', [\App\Http\Controllers\BooksController::class,"getBooks"]);

Route::get('/collections/{id}', [\App\Http\Controllers\BooksController::class, "getBookDetail"]);

Route::get('/add_collection', [\App\Http\Controllers\BooksController::class,"storeCollection"]);

Route::get('/daftar-peminjaman', [\App\Http\Controllers\PeminjamanController::class, "daftarPeminjaman"]);
