<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;
    protected $table = "htrans";
    protected $primaryKey = "htrans_id";
    public $timestamps = true;
    public $incrementing = true;

    function InsertTransaction($data)
    {
        // Insert Dulu
        $htrans = new Htrans();
        $htrans->htrans_date = $data["htrans_date"];
        $htrans->htrans_customer = $data["htrans_customer"];
        $htrans->htrans_total = $data["htrans_total"];
        $htrans->save();

        // Dicarikan Code
        $htrans->htrans_code = $this->GetTransCode();
        $htrans->save();

        $detail = json_decode($data["dtrans"], true);
        $dtrans = new Dtrans();

        foreach ($detail as $key => $value) {
            $dtrans->InsertTransaction([
                "barang_id" => $value["barang_id"],
                "barang_name" => $value["barang_name"],
                "barang_price" => $value["barang_price"],
                "barang_count" => $value["barang_count"],
                "subtotal" => $value["subtotal"],
            ]);
        }
    }

    function GetTransCode($id = null)
    {
        $data = "";
        if ($id !== null) {
            $data = Htrans::max('transaksi_id') + 1;
        } else {
            $data = $id;
        }

        $code = "INV" . str_pad($data, 5, 0, STR_PAD_LEFT);
        return $code;
    }

    function GetTransaction() {}
}
