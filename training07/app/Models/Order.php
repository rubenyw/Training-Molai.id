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
        // $orderCode = "OD" . str_pad(Order::count(), 5, '0', STR_PAD_LEFT);
        // dd($data);
        $newOrder = new Order();

        $orderCode = "OD" . str_pad($newOrder->order_id, 5, '0', STR_PAD_LEFT);
        $newOrder->order_code = $orderCode;
        $newOrder->order_date = $data["order_date"];
        $newOrder->order_cashier = $data["order_cashier"];
        $newOrder->order_customer = $data["order_customer"];
        $newOrder->meja_id = $data["meja_id"];
        $newOrder->order_total = $data["order_total"];
        $newOrder->save();

        // Buat Meja tidak avaialble
        $meja = Meja::find($newOrder->meja_id);
        $meja->meja_available = 0;
        $meja->save();

        // Detail Order
        $detailOrder = array_map(function ($detail) use ($newOrder) {
            return [
                "order_id" => $newOrder->order_id,
                "menu_id" => $detail['menu_id'],
                "detail_name" => $detail['menu_name'],
                "detail_price" => $detail['menu_price'],
                "detail_qty" => $detail['order_qty'],
                "detail_subtotal" => $detail['order_subtotal'],
                "detail_notes" => ""
            ];
        }, $data['detail_order']);

        (new DetailOrder())->InsertDetailOrder($detailOrder);
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
