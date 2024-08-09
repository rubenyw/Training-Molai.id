<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = "customer_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetCustomer() {
        $customer = Customer::where("status", "=", "1");
        return $customer;
    }

    function InsertCustomer($data) {
        $customer = new Customer();
        $customer->customer_name = $data["customer_name"];
        $customer->save();
    }
}
