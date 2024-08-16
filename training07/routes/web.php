<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TableController::class, "TablePage"]);
Route::get('/getTable', [TableController::class, "GetTable"]);
Route::post('/insertTable', [TableController::class, "InsertTable"]);

Route::get('/menu', [MenuController::class, "MenuPage"]);
Route::get('/getMenu', [MenuController::class, "GetMenu"]);
Route::post('/insertMenu', [MenuController::class, "InsertMenu"]);
