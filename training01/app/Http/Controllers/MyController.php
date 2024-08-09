<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function HomePage()
    {
        $array = ['satu', 'dua', 'tiga'];
        return view("home.homepage")->with("array", $array);
    }

    function MainPage()
    {
        return view("home.mainpage");
    }

    function CobaPage()
    {
        return view("home.cobapage");
    }
}
