<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    function TransaksiPage()
    {
        $param["barang"] = Barang::where("status", "=", "1");
        return view("transaksi")->with($param);
    }

    function Invoice($id)
    {
        $pdf = Pdf::loadView("invoice");
        return $pdf->stream();
    }
}
