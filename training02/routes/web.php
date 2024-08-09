<?php

use App\Http\Controllers\FRSController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PengambilanController;
use Illuminate\Support\Facades\Route;

Route::get("/", [GeneralController::class, "HomePage"])->name("homepage");
Route::prefix("/master")->group(function () {
    Route::prefix("/mahasiswa")->group(function () {
        Route::get("/", [MahasiswaController::class, "MasterMahasiswaPage"])->name("mhs_index");
        Route::post("/insert", [MahasiswaController::class, "InsertMahasiswa"]);
        Route::post("/edit", [MahasiswaController::class, "EditMahasiswa"]);
        Route::post("/delete", [MahasiswaController::class, "DeleteMahasiswa"]);
    });

    Route::prefix("/jurusan")->group(function () {
        Route::get("/", [JurusanController::class, "MasterJurusanPage"])->name("jurusan_index");
        Route::post("/insert", [JurusanController::class, "InsertJurusan"]);
        Route::post("/edit", [JurusanController::class, "EditJurusan"]);
        Route::post("/delete", [JurusanController::class, "DeleteJurusan"]);
    });

    Route::prefix("/matkul")->group(function () {
        Route::get("/", [MatkulController::class, "MasterMatkulPage"])->name("matkul_index");
        Route::post("/insert", [MatkulController::class, "InsertMatkul"]);
        Route::post("/edit", [MatkulController::class, "EditMatkul"]);
        Route::post("/delete", [MatkulController::class, "DeleteMatkul"]);
    });
});

Route::prefix("/transaksi")->group(function () {
    Route::prefix("/pengambilan")->group(function () {
        Route::get("/", [PengambilanController::class, "TransaksiPengambilanPage"])->name("pengambilan_index");
        Route::post("/insert", [PengambilanController::class, "InsertPengambilan"]);
        Route::post("/edit", [PengambilanController::class, "EditPengambilan"]);
        Route::post("/delete", [PengambilanController::class, "DeletePengambilan"]);
    });
});

Route::prefix("/frs")->group(function () {
    Route::prefix("/pengambilan")->group(function () {
        Route::get("/", [FRSController::class, "FRSPage"])->name("frs_index");
        Route::post("/insert", [FRSController::class, "InsertFRS"]);
        Route::post("/edit", [FRSController::class, "EditFRS"]);
        Route::post("/delete", [FRSController::class, "DeleteFRS"]);
    });
});
