<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    function TransaksiPage()
    {
        return view("Admin.Transaksi.transaksi_page");
    }

    function GetSessionIndex($string, $id)
    {
        foreach (Session::get($string) as $key => $value) {
            if ($value[$string . "_id"] == $id) {
                return $key;
            }
        }

        return -1;
    }

    function InsertTransaksi(Request $req)
    {
        // dd($req->all());
        $data = Session::get("transaksi");
        $customer = $this->GetSessionIndex("customer", $req->customer_id);
        $barang = $this->GetSessionIndex("barang", $req->barang_id);

        $customer = Session::get("customer")[$customer];
        $barang = Session::get("barang")[$barang];

        array_push($data, [
            "transaksi_id" => uniqid(),
            "transaksi_date" => $req->transaksi_date,
            "customer_id" => $req->customer_id,
            "barang_id" => $req->barang_id,
            "barang_stock" => $req->barang_stock,
            "customer_name" => $customer["customer_name"],
            "barang_name" => $barang["barang_name"],
            "status" => 1, // 1 = Pending, 2 = Process, 3 = Done, 4 = Cancel
        ]);

        Session::put("transaksi", $data);
        return redirect()->route("transaksi_page");
    }
}
