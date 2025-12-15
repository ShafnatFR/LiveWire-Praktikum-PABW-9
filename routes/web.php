<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');