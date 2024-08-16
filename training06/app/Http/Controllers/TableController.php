<?php

namespace App\Http\Controllers;

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
        $table = (new table())->GetTable();
        return $table;
    }

    function InsertTable(Request $req)
    {
        // dd($req->all());
        (new table())->InsertTable($req->all());
    }

    function UpdateTable(Request $req)
    {
        (new table())->UpdateTable($req->all());
    }

    function DeleteTable($table_id)
    {
        (new table())->DeleteTable($table_id);
    }
}
