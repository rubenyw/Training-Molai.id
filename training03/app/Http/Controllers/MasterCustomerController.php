<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterCustomerController extends Controller
{
    function MasterCustomerPage()
    {
        $customer = new Customer();
        $param["customer"] = $customer->GetCustomer();

        return view("Admin.Master Customer.master_customer")->with($param);
    }

    function InsertCustomer(Request $req)
    {
        $customer = new Customer();
        $customer->InsertCustomer($req->all());

        return redirect()->route("master_customer_page");
    }

    function EditCustomer(Request $req)
    {
        // dd($req->all());
        $idx = $this->FindCustomerIndex($req->edit_id);
        if ($idx == -1) return;

        $data = Session::get("customer");
        $data[$idx]["customer_name"] = $req->customer_name;
        Session::put("customer", $data);

        return redirect()->route("master_customer_page");
    }

    function DeleteCustomer(Request $req)
    {
        $idx = $this->FindCustomerIndex($req->id);
        if ($idx == -1) return;

        $data = Session::get("customer");
        array_splice($data, $idx, 1);
        Session::put("customer", $data);

        return redirect()->route("master_customer_page");
    }

    function FindCustomerIndex($id)
    {
        $data = Session::get("customer");
        foreach ($data as $key => $value) {
            if ($value["customer_id"] == $id) {
                return $key;
            }
        }

        return -1;
    }
}
