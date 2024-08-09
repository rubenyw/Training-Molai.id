<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FRSController extends Controller
{
    function FRSPage()
    {
        return view("FRS.frs_page");
    }
}
