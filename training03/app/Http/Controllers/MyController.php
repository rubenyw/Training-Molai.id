<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{
    function LoginPage()
    {
        if (!Session::has("customer")) Session::put("customer", []);
        if (!Session::has("barang")) Session::put("barang", []);
        if (!Session::has("history_stock")) Session::put("history_stock", []);
        if (!Session::has("transaksi")) Session::put("transaksi", []);
        
        return view("General.login_page");
    }

    function FindCustomer($username)
    {
        $customer = Session::get("customer");
        foreach ($customer as $key => $value) {
            if ($value["customer_name"] == $username) {
                return $value;
            }
        }
        return null;
    }

    function LoginUser(Request $req)
    {
        if ($req->input_username == "admin") {
            return Redirect("/admin");
        } else {
            $customer = $this->FindCustomer($req->input_username);
            if ($customer != null) {
                Session::put("customer_login", $customer);
                return Redirect("/customer");
            }
        }
    }
}
