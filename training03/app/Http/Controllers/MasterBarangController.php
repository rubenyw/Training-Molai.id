<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterBarangController extends Controller
{
    function MasterBarangPage()
    {
        return view("Admin.Master Barang.master_barang");
    }

    function FindBarangIndex($id)
    {
        foreach (Session::get("barang") as $key => $value) {
            if ($value["barang_id"] == $id) {
                return $key;
            }
        }

        return -1;
    }

    function InsertBarang(Request $req)
    {
        $data = Session::get("barang");
        array_push($data, [
            "barang_id" => uniqid(),
            "barang_name" => $req->barang_name,
            "barang_stock" => 0
        ]);

        Session::put("barang", $data);
        return redirect()->route("master_barang_page");
    }

    function EditBarang(Request $req)
    {
        // dd($req->all());
        $idx = $this->FindBarangIndex($req->edit_id);
        if ($idx == -1) return;

        $data = Session::get("barang");
        $data[$idx]["barang_name"] = $req->barang_name;
        Session::put("barang", $data);

        return redirect()->route("master_barang_page");
    }

    function DeleteBarang(Request $req)
    {
        $idx = $this->FindBarangIndex($req->id);
        if ($idx == -1) return;

        $data = Session::get("barang");
        array_splice($data, $idx, 1);
        Session::put("barang", $data);

        return redirect()->route("master_barang_page");
    }
}
