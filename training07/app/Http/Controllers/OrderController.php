<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function InsertOrder(Request $request)
    {
        (new Order())->InsertOrder($request->all());
        // (new DetailOrder())->InsertDetailOrder($request->all());
    }
}
