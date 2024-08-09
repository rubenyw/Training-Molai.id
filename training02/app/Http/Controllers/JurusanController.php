<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    function MasterJurusanPage()
    {
        return view("Master Jurusan.index");
    }

    function InsertJurusan(Request $req)
    {
        $data = Session::get("jurusan");
        array_push($data, [
            "uid" => uniqid("JUR"),
            "jurusan_nama" => $req->jurusan
        ]);

        Session::put("jurusan", $data);
        return redirect()->route("jurusan_index");
    }

    function EditJurusan(Request $req)
    {
        $idx = $req["edit-index"];
        $data = Session::get("jurusan");
        $data[$idx]["jurusan_nama"] = $req->jurusan;

        // Edit Semua jurusan mahasiswa
        $mahasiswa = Session::get("mahasiswa");
        foreach ($mahasiswa as $key => $value) {
            if ($value["jurusan_uid"] == $data[$idx]["uid"]) {
                $mahasiswa[$key]["mahasiswa_jurusan"] = $req->jurusan;
            }
        }

        Session::put("jurusan", $data);
        Session::put("mahasiswa", $mahasiswa);
        return redirect()->route("jurusan_index");
    }

    function DeleteJurusan(Request $req)
    {
        // dd($req->all());
        $idx = $req["delete-index"];
        $data = Session::get("jurusan");
        array_splice($data, $idx, 1);

        Session::put("jurusan", $data);
        return redirect()->route("jurusan_index");
    }
}
