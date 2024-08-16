<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class table extends Model
{
    use HasFactory;
    protected $table = "tables";
    protected $primaryKey = "table_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetTable()
    {
        $table = DB::table('tables')->where("status", "=", 1)->get();
        return $table;
    }

    function InsertTable($data)
    {
        $newTable = new table();
        $newTable->table_name = $data["table_name"];
        $newTable->table_capacity = $data["table_capacity"];

        $newTable->save();
    }
}
