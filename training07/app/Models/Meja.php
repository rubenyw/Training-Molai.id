<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $meja = "mejas";
    protected $primaryKey = "meja_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetMeja()
    {
        $meja = Meja::where("status", "=", 1)->get();
        return $meja;
    }

    function InsertMeja($data)
    {
        $newMeja = new Meja();
        $newMeja->meja_name = $data["meja_name"];
        $newMeja->meja_capacity = $data["meja_capacity"];

        $newMeja->save();
    }
}
