<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    function GetDetailOrder($meja_id)
    {
        $newestOrder = Order::where("meja_id", "=", $meja_id)->get()[0];
        
    }
}
