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

Route::get('/', [\App\Http\Controllers\HalamanUtamaController::class, "getBooks"]);

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, "index"]);

Route::get('/collections', [\App\Http\Controllers\BooksController::class,"getBooks"])->name('collections');

Route::get('/collections/{id}', [\App\Http\Controllers\BooksController::class, "getBookDetail"])->name("detailCollection");

Route::get('/add_collection', [\App\Http\Controllers\BooksController::class,"storeCollection"]);
Route::post('/add_collection_db', [\App\Http\Controllers\BooksController::class,"storeCollectionDB"])->name('storeCollectionDB');

Route::get('/update_collection/{id}', [\App\Http\Controllers\BooksController::class, "updateCollection"]);
Route::post('/update_collection_db/{id}', [\App\Http\Controllers\BooksController::class, "updateCollectionDB"])->name('updateCollectionDB');

Route::get('/daftar-peminjaman', [\App\Http\Controllers\PeminjamanController::class, "daftarPeminjaman"]);
