<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\PeminjamanController;
use \App\Http\Controllers\TamuController;

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

Route::get('/', [HalamanUtamaController::class, "getBooks"])->name('halamanUtama');


Auth::routes();

Route::get('/home', [DashboardController::class, "index"]);

Route::middleware(['auth', 'user-role:user,admin'])->group(function() {
    // koleksi buku
    Route::get('/collections', [BooksController::class,"getBooks"])->name('collections');
    Route::get('/collections/{id}', [BooksController::class, "getBookDetail"])->name("detailCollection");

    // peminjaman
    Route::get('/buat-peminjaman', [PeminjamanController::class, "createPeminjaman"]);
    Route::post('/buat-peminjaman-db', [PeminjamanController::class, "createPeminjamanDB"])->name("createPeminjamanDB");
    Route::get('/api/get-user-id', [\App\Http\Controllers\APIPeminjamanController::class, 'getUserId']);
    Route::get('/daftar-peminjaman', [\App\Http\Controllers\PeminjamanController::class, "daftarPeminjaman"])->name('daftar.peminjaman');
    Route::get('/peminjaman/{id}', [\App\Http\Controllers\PeminjamanController::class, "detailPeminjaman"])->name('detail.peminjaman');
    Route::get('/delete_peminjaman/{id}', [PeminjamanController::class,"deletePeminjaman"])->name('delete.peminjaman');
    Route::get('/kembalikan_peminjaman/{id}', [PeminjamanController::class,"pengembalian"])->name('pengembalian');
    Route::get('/peminjaman_buku_langsung', [PeminjamanController::class, 'createPeminjamanLangsung'])->name('create.peminjaman');

});

Route::middleware(['auth', 'user-role:admin'])->group(function() {

    // tamu
    Route::get("/admin/tamu", [TamuController::class, 'index'])->name('daftar.tamu');
    Route::get("/admin/delete_tamu/{id}", [TamuController::class, 'deleteTamu'])->name('delete.tamu');

    // koleksi buku
    Route::get('/update_collection/{id}', [BooksController::class, "updateCollection"]);
    Route::post('/update_collection_db/{id}', [BooksController::class, "updateCollectionDB"])->name('updateCollectionDB');
    Route::get('/add_collection', [BooksController::class,"storeCollection"]);
    Route::get('/delete_collection/{id}', [BooksController::class,"deleteCollection"])->name('delete.collection');
    Route::post('/add_collection_db', [BooksController::class,"storeCollectionDB"])->name('storeCollectionDB');
});

