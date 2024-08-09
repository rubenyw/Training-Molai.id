<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function AdminPage()
    {
        return view("Admin.admin_dashboard");
    }
}
