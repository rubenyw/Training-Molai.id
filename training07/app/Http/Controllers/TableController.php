<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    function TablePage()
    {
        return view("Table.table");
    }

    function GetTable()
    {
        $table = (new Meja())->GetMeja();
        return $table;
    }

    function InsertTable(Request $req)
    {
        // dd($req->all());
        (new Meja())->InsertMeja($req->all());
    }
}
