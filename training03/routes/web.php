<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterCustomerController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\TambahStockController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [MyController::class, "LoginPage"])->name("login_page");
Route::post('/login', [MyController::class, "LoginUser"]);

Route::prefix("/admin")->group(function () {
    Route::get("/", [AdminController::class, "AdminPage"])->name("admin_page");

    Route::prefix("/customer")->group(function () {
        Route::get("/", [MasterCustomerController::class, "MasterCustomerPage"])->name("master_customer_page");
        Route::post("/insert", [MasterCustomerController::class, "InsertCustomer"]);
        Route::post("/edit", [MasterCustomerController::class, "EditCustomer"]);
        Route::post("/delete", [MasterCustomerController::class, "DeleteCustomer"]);
    });

    Route::prefix("/barang")->group(function () {
        Route::get("/", [MasterBarangController::class, "MasterBarangPage"])->name("master_barang_page");
        Route::post("/insert", [MasterBarangController::class, "InsertBarang"]);
        Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });

    Route::prefix("/tambah_stock")->group(function () {
        Route::get("/", [TambahStockController::class, "TambahStockPage"])->name("tambah_stock_page");
        Route::post("/insert", [TambahStockController::class, "TambahStockBarang"]);
        // Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        // Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });

    Route::prefix("/transaksi")->group(function () {
        Route::get("/", [TransaksiController::class, "TransaksiPage"])->name("transaksi_page");
        Route::post("/insert", [TransaksiController::class, "InsertTransaksi"]);
        // Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        // Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });
});

Route::prefix("/customer")->group(function () {
    Route::get("/", [CustomerController::class, "CustomerPage"])->name("customer_page");

    Route::prefix("/customer")->group(function () {
        // Route::get("/", [MasterCustomerController::class, "MasterCustomerPage"])->name("master_customer_page");
        Route::post("/insert", [MasterCustomerController::class, "InsertCustomer"]);
        Route::post("/edit", [MasterCustomerController::class, "EditCustomer"]);
        Route::post("/delete", [MasterCustomerController::class, "DeleteCustomer"]);
    });

    Route::prefix("/barang")->group(function () {
        Route::get("/", [MasterBarangController::class, "MasterBarangPage"])->name("master_barang_page");
        Route::post("/insert", [MasterBarangController::class, "InsertBarang"]);
        Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });

    Route::prefix("/tambah_stock")->group(function () {
        Route::get("/", [TambahStockController::class, "TambahStockPage"])->name("tambah_stock_page");
        Route::post("/insert", [TambahStockController::class, "TambahStockBarang"]);
        // Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        // Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });

    Route::prefix("/transaksi")->group(function () {
        Route::get("/", [TransaksiController::class, "TransaksiPage"])->name("transaksi_page");
        Route::post("/insert", [TransaksiController::class, "TambahStockBarang"]);
        // Route::post("/edit", [MasterBarangController::class, "EditBarang"]);
        // Route::post("/delete", [MasterBarangController::class, "DeleteBarang"]);
    });
});


Route::get("/flush", function () {
    Session::flush();
    return redirect("/");
})->name("flush");
