<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BarangController::class, "MasterBarangPage"]);

Route::post('/baranginsert', [BarangController::class, "InsertBarang"]);

// Route::get("/category", [CategoryController::class, ""]);
// Route::post("/insertCategory", [CategoryController::class, ""]);
// Route::post("/updateCategory", [CategoryController::class, ""]);
// Route::post("/deleteCategory", [CategoryController::class, ""]);

Route::get("/transaksi", [TransaksiController::class, "TransaksiPage"]);
Route::get("/invoice/{id}", [TransaksiController::class, "Invoice"])->name('invoice.show');
