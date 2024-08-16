<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TableController::class, "TablePage"]);
Route::post('/insertTable', [TableController::class, "InsertTable"]);

Route::get('/menu', [MenuController::class, "MenuPage"]);
Route::post('/insertTable', [MenuController::class, "InsertMenu"]);
