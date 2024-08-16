<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    function TablePage()
    {
        return view("table");
    }

    function GetTable()
    {
        $table = (new Table())->GetTable();
        dd($table);
        return $table;
    }

    function InsertTable(Request $req)
    {
        (new Table())->InsertTable($req->all());
    }

    function UpdateTable(Request $req)
    {
        (new Table())->UpdateTable($req->all());
    }

    function DeleteTable($table_id)
    {
        (new Table())->DeleteTable($table_id);
    }
}
