<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatkulController extends Controller
{
    function MasterMatkulPage()
    {
        return view("Master Matkul.index");
    }

    function GetMatkulJurusan($uid)
    {
        foreach (Session::get("jurusan") as $key => $value) {
            if ($value["uid"] == $uid) {
                return $value;
            }
        }

        return null;
    }

    function InsertMatkul(Request $req)
    {
        // dd($req->all());
        $data = Session::get("matkul");
        $jurusan = $this->GetMatkulJurusan($req->jurusan);

        array_push($data, [
            "uid" => uniqid("MKL"),
            "matkul_nama" => $req->matkul,
            "jurusan_uid" => $req->jurusan,
            "jurusan_nama" => $jurusan["jurusan_nama"]
        ]);

        Session::put("matkul", $data);
        return redirect()->route("matkul_index");
    }

    function EditMatkul(Request $req)
    {
        $idx = $req["edit-index"];
        $data = Session::get("matkul");
        $jurusan = $this->GetMatkulJurusan($req->jurusan);

        $data[$idx]["matkul_nama"] = $req->matkul;
        $data[$idx]["jurusan_uid"] = $req->jurusan;
        $data[$idx]["jurusan_nama"] = $jurusan["jurusan_nama"];

        Session::put("matkul", $data);
        return redirect()->route("matkul_index");
    }

    function DeleteMatkul(Request $req)
    {
        $idx = $req["delete-index"];
        $data = Session::get("matkul");

        array_splice($data, $idx, 1);
        Session::put("matkul", $data);
        return redirect()->route("matkul_index");
    }
}
