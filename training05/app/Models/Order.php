<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "order_id";
    public $timestamps = true;
    public $incrementing = true;

    function InsertOrder($data)
    {
        $newOrder = new Order();
        $newOrder->order_code = $data["order_code"];
        $newOrder->order_date = $data["order_date"];
        $newOrder->order_cashier = $data["order_cashier"];
        $newOrder->order_customer = $data["order_customer"];
        $newOrder->table_id = $data["table_id"];
        $newOrder->order_total = $data["order_total"];
        $newOrder->save();
    }

    function UpdateOrder($data)
    {
        $updateOrder = Order::find($data["order_id"]);
        $updateOrder->order_date = $data["order_date"];
        $updateOrder->order_cashier = $data["order_cashier"];
        $updateOrder->order_customer = $data["order_customer"];
        $updateOrder->table_id = $data["table_id"];
        $updateOrder->order_total = $data["order_total"];
        $updateOrder->save();
    }

    function DeleteOrder($order_id)
    {
        $updateOrder = Order::find($order_id);
        $updateOrder->status = 0;
        $updateOrder->save();
    }
}
