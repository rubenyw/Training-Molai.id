<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Table extends Model
{
    use HasFactory;
    protected $table = "tables";
    protected $primaryKey = "table_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetTable()
    {
        // dd(DB::table("tables")->get());
        $table = Table::where("status", "=", 1)->get();
        return $table;
    }

    function InsertTable($data)
    {
        $newTable = new Table();
        $newTable->table_name = $data["table_name"];
        $newTable->table_capacity = $data["table_capacity"];
        $newTable->save();
    }

    function UpdateTable($data)
    {
        $updateTable = Table::find($data["table_id"]);
        $updateTable->table_name = $data["table_name"];
        $updateTable->table_capacity = $data["table_capacity"];
        $updateTable->table_available = $data["table_available"];
        $updateTable->save();
    }

    function DeleteTable($table_id)
    {
        $updateTable = Table::find($table_id);
        $updateTable->status = 0;
        $updateTable->save();
    }
}
