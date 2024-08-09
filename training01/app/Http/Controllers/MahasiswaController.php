<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    function IndexPage()
    {
        return view("mahasiswa.index");
    }

    function MahasiswaPage()
    {
        $param["data"] = [];
        return view("mahasiswa.mahasiswa")->with($param);
    }

    function InsertMahasiswa(Request $req)
    {
        // dd($req->all());
        $data = json_decode($req->data, true);
        array_push($data, [
            "NRP" => $req->mahasiswa_nrp,
            "Nama" => $req->mahasiswa_nama,
            "Jurusan" => $req->mahasiswa_jurusan
        ]);

        $param["data"] = $data;
        return view("mahasiswa.mahasiswa")->with($param);
    }

    function MahasiswaSessionPage()
    {
        if (!Session::has("mahasiswa")) Session::put("mahasiswa", []);
        return view("mahasiswa.mahasiswasession");
    }

    function InsertSessionMahasiswa(Request $req)
    {
        // dd($req->all());
        $data = Session::get("mahasiswa");
        array_push($data, [
            "mahasiswa_nrp" => $req->mahasiswa_nrp,
            "mahasiswa_nama" => $req->mahasiswa_nama,
            "mahasiswa_jurusan" => $req->mahasiswa_jurusan,
        ]);

        Session::put("mahasiswa", $data);
        return view("mahasiswa.mahasiswasession");
    }
}
