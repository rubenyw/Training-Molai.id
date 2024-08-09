<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    function HomePage()
    {
        // Session::flush();
        // dd(Session::all());
        if (!Session::has("mahasiswa")) Session::put("mahasiswa", []);
        if (!Session::has("matkul")) Session::put("matkul", []);
        if (!Session::has("jurusan")) Session::put("jurusan", []);
        if (!Session::has("pengambilan")) Session::put("pengambilan", []);
        return view("Home.index");
    }
}
