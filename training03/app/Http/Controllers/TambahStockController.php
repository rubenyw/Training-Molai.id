<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TambahStockController extends Controller
{
    function TambahStockPage()
    {
        return view("Admin.Tambah Stock.tambah_stock");
    }

    function FindBarangIndex($id)
    {
        $barang = Session::get("barang");
        foreach ($barang as $key => $value) {
            if ($value["barang_id"] == $id) return $key;
        }

        return -1;
    }
    function TambahStockBarang(Request $req)
    {
        // dd($req->all());
        $barang = Session::get("barang");
        $index = $this->FindBarangIndex($req->barang_id);

        $barang[$index]["barang_stock"] += ($req->barang_stock);
        Session::put("barang", $barang);

        $history = Session::get("history_stock");
        array_push($history, [
            "history_id" => uniqid(),
            "barang_id" => $barang[$index]["barang_id"],
            "barang_nama" => $barang[$index]["barang_name"],
            "stock" => $req->barang_stock
        ]);
        Session::put("history_stock", $history);

        return redirect()->route("tambah_stock_page");
    }
}
