<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function MasterBarangPage()
    {
        $b = new Barang();
        $param["barang"] = $b->GetAllBarang();

        return view("index")->with($param);
    }

    function InsertBarang(Request $req)
    {
        $data = $req->all();
        $data["barang_picture"] = $this->insertFile($req->barang_picture, "gambar_barang");
        $b = new Barang();
        $b->InsertBarang($data);

        return redirect("/");
    }

    function insertFile($file, $folder)
    {
        try {
            $fileName = uniqid() . "." . $file->extension(); //nama baru
            $path = "/upload/" . $folder . "/";
            $file->move(public_path($path), $fileName);

            return $fileName;
        } catch (\Throwable $th) {
            return -1;
        }
    }
}
