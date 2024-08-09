<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengambilanController extends Controller
{
    function TransaksiPengambilanPage()
    {
        return view("Transaski Pengambilan.index");
    }

    function PengambilanGetSession($uid, $session)
    {
        foreach (Session::get($session) as $key => $value) {
            if ($value["uid"] == $uid) {
                return $value;
            }
        }
        return null;
    }

    function InsertPengambilan(Request $req)
    {
        $mahasiswa = $this->PengambilanGetSession($req->mahasiswa_uid, "mahasiswa");
        $matkul = $this->PengambilanGetSession($req->matkul_uid, "matkul");
        $jurusan = $this->PengambilanGetSession($mahasiswa["jurusan_uid"], "jurusan");

        $data = Session::get("pengambilan");
        array_push($data, [
            "uid" => uniqid("PGN"),
            "mahasiswa_nrp" => $mahasiswa["mahasiswa_nrp"],
            "mahasiswa_nama" => $mahasiswa["mahasiswa_nama"],
            "mahasiswa_uid" => $mahasiswa["uid"],
            "jurusan_uid" => $mahasiswa["jurusan_uid"],
            "jurusan_nama" => $jurusan["jurusan_nama"],
            "matkul_uid" => $matkul["uid"],
            "matkul_nama" => $matkul["matkul_nama"],
        ]);

        Session::put("pengambilan", $data);
        return redirect()->route("pengambilan_index");
    }

    function EditPengambilan(Request $req)
    {
    }

    function DeletePengambilan(Request $req)
    {
        $idx = $req["delete-index"];
        $data = Session::get("pengambilan");

        array_splice($data, $idx, 1);
        Session::put("pengambilan", $data);

        return redirect()->route("pengambilan_index");
    }
}
