<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/create', [MahasiswaController::class, 'create']);
Route::post('/', [MahasiswaController::class, 'store']);
Route::delete('/{mahasiswa}', [MahasiswaController::class, 'destroy']);
Route::get('/{mahasiswa}/edit', [MahasiswaController::class, 'edit']);
Route::put('/{mahasiswa}', [MahasiswaController::class, 'update']);
