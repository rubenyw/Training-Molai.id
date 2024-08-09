<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $primaryKey = "barang_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetAllBarang()
    {
        $data = Barang::where("status", "=", 1);
        $data = $data->get();

        return $data;
    }

    function InsertBarang($data)
    {
        $b = new Barang();
        $b->category_id = 1;
        $b->barang_code = $data["barang_code"];
        $b->barang_name = $data["barang_name"];
        $b->barang_stock = $data["barang_stock"];
        $b->barang_price = $data["barang_price"];
        $b->barang_picture = $data["barang_picture"];
        $b->save();
    }
}
