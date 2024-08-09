<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    function CustomerPage()
    {
        $param["customer"] = Session::get("customer_login");
        return view("Customer.customer_dashboard")->with($param);
    }
}
