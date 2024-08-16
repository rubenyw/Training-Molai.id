<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MenuController::class, "MenuPage"]);
Route::get("/getMenu", [MenuController::class, "GetMenu"]);
Route::post("/insertMenu", [MenuController::class, "InsertMenu"]);
Route::post("/updateMenu", [MenuController::class, "UpdateMenu"]);
Route::post("/deleteMenu/{menu_id}", [MenuController::class, "DeleteMenu"]);

Route::get("/table", [TableController::class, "TablePage"]);
Route::get("/getTable", [TableController::class, "GetTable"]);
Route::post("/insertTable", [TableController::class, "InsertTable"]);
Route::post("/updateTable", [TableController::class, "UpdateTable"]);
Route::post("/deleteTable/{table_id}", [TableController::class, "DeleteTable"]);

// Route::get("/", [MenuController::class, "MenuPage"]);
// Route::post("/insertMenu", [MenuController::class, "InsertMenu"]);
// Route::post("/updateMenu", [MenuController::class, "UpdateMenu"]);
// Route::post("/deleteMenu/$menu_id", [MenuController::class, "DeleteMenu"]);
