<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function MenuPage()
    {
        return view("Menu.menu");
    }

    function GetMenu()
    {
        $menu = (new menu())->GetMenu();
        return $menu;
    }

    function InsertMenu(Request $req)
    {
        // dd($req->all());
        (new menu())->InsertMenu($req->all());
    }

    function UpdateMenu(Request $req)
    {
        (new menu())->UpdateMenu($req->all());
    }

    function DeleteMenu($menu_id)
    {
        (new menu())->DeleteMenu($menu_id);
    }
}
