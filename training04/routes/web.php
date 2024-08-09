<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BarangController::class, "MasterBarangPage"]);

Route::post('/baranginsert', [BarangController::class, "InsertBarang"]);

Route::get("/category", [CategoryController::class, ""]);
Route::post("/insertCategory", [CategoryController::class, ""]);
Route::post("/updateCategory", [CategoryController::class, ""]);
Route::post("/deleteCategory", [CategoryController::class, ""]);
