<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [MyController::class, 'HomePage'])->name('homepage');
Route::get('/main', [MyController::class, 'MainPage'])->name('mainpage');
Route::get('/coba', [MyController::class, 'CobaPage'])->name('cobapage');

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'IndexPage'])->name('mahasiswa_indexpage');
    Route::get('/mahasiswa', [MahasiswaController::class, 'MahasiswaPage'])->name('mahasiswapage');
    Route::post('/insertMahasiswa', [MahasiswaController::class, 'InsertMahasiswa']);
    Route::get('/homeSession', [MahasiswaController::class, 'MahasiswaSessionPage'])->name('mahasiswasessionpage');
    Route::post('/insertSessionMahasiswa', [MahasiswaController::class, 'InsertSessionMahasiswa']);
});
