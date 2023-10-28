<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TamuController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tamu', [TamuController::class, "storeTamu"])->name('storeTamuDB');

Route::post('/books', [\App\Http\Controllers\APIBooksController::class, 'saveBook']);
Route::put('/book/{id}', [\App\Http\Controllers\APIBooksController::class, 'updateBook']);
Route::delete('/book/{id}', [\App\Http\Controllers\APIBooksController::class, 'deleteBook']);

// API untuk preview book
Route::get('/books', [\App\Http\Controllers\APIBooksController::class, 'getAllBooks']);
Route::get('/book/{id}', [\App\Http\Controllers\APIBooksController::class, 'getDetailBook']);

// API untuk count total ketersediaan book
Route::get('/book_count/{id}', [\App\Http\Controllers\APIBooksController::class, 'getCountBook']);


Route::post('/peminjaman_buku', [\App\Http\Controllers\APIPeminjamanController::class, 'createPeminjaman']);

// dashboard
Route::get('/dashboard/tamu', [DashboardController::class, 'getDashboardTamu']);
Route::get('/dashboard/peminjaman', [DashboardController::class, 'getDashboardPeminjaman']);
