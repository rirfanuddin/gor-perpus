<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/books', [\App\Http\Controllers\APIBooksController::class, 'getAllBooks']);
Route::post('/books', [\App\Http\Controllers\APIBooksController::class, 'saveBook']);
Route::put('/book/{id}', [\App\Http\Controllers\APIBooksController::class, 'updateBook']);
Route::delete('/book/{id}', [\App\Http\Controllers\APIBooksController::class, 'deleteBook']);
