<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;
    protected $table = "dtrans";
    protected $primaryKey = "dtrans_id";
    public $timestamps = true;
    public $incrementing = true;

    function InsertTransaction($data)
    {
        // Insert Dulu
        $dtrans = new Dtrans();
        $dtrans->barang_id = $data["barang_id"];
        $dtrans->barang_name = $data["barang_name"];
        $dtrans->barang_price = $data["barang_price"];
        $dtrans->barang_count = $data["barang_count"];
        $dtrans->subtotal = $data["subtotal"];
        $dtrans->save();
    }
}
