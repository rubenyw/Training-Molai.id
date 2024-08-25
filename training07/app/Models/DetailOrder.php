<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = "detail_orders";
    protected $primaryKey = "detail_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetDetailOrder($detaiL_id)
    {
        // $detail_order = 
    }

    function InsertDetailOrder($data)
    {
        DetailOrder::insert($data);
    }
}
