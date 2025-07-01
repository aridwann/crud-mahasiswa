<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'get']);
Route::post('/', [MahasiswaController::class, 'add']);
Route::delete('/{mahasiswa}', [MahasiswaController::class, 'delete']);
Route::get('/{mahasiswa}', [MahasiswaController::class, 'setEdit']);
Route::put('/{mahasiswa}', [MahasiswaController::class, 'edit']);
