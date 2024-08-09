<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    function MasterMahasiswaPage()
    {
        return view("Master Mahasiswa.index");
    }

    function GetMahasiswaJurusan($uid)
    {
        foreach (Session::get("jurusan") as $key => $value) {
            if ($value["uid"] == $uid) {
                return $value;
            }
        }

        return null;
    }

    function InsertMahasiswa(Request $req)
    {
        // dd($req->all());
        $data = Session::get("mahasiswa");
        $jurusan = $this->GetMahasiswaJurusan($req->mahasiswa_jurusan);
        array_push($data, [
            "uid" => uniqid("MHS"),
            "mahasiswa_nama" => $req->mahasiswa_nama,
            "mahasiswa_nrp" => $req->mahasiswa_nrp,
            "mahasiswa_jurusan" => $jurusan["jurusan_nama"],
            "jurusan_uid" => $req->mahasiswa_jurusan
        ]);

        Session::put("mahasiswa", $data);
        return redirect()->route('mhs_index');
    }

    function EditMahasiswa(Request $req)
    {
        $idx = $req["edit-index"];
        $data = Session::get("mahasiswa");
        $jurusan = $this->GetMahasiswaJurusan($req->mahasiswa_jurusan);
        $data[$idx]["mahasiswa_nama"] = $req["mahasiswa_nama"];
        $data[$idx]["mahasiswa_nrp"] = $req["mahasiswa_nrp"];
        $data[$idx]["mahasiswa_jurusan"] = $jurusan["jurusan_nama"];
        $data[$idx]["jurusan_uid"] = $req["mahasiswa_jurusan"];

        Session::put("mahasiswa", $data);
        return redirect()->route('mhs_index');
    }

    function DeleteMahasiswa(Request $req)
    {
        $idx = $req["delete-index"];
        $data = Session::get("mahasiswa");
        array_splice($data, $idx, 1);
        Session::put("mahasiswa", $data);

        return redirect()->route('mhs_index');
    }
}
