<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function MenuPage()
    {
        return view("Menu.menu");
    }

    function GetMenu()
    {
        $menu = (new Menu())->GetMenu();
        return $menu;
    }

    function InsertMenu(Request $req)
    {
        // dd($req->all());
        (new Menu())->InsertMenu($req->all());
    }

    function UpdateMenu(Request $req)
    {
        (new Menu())->UpdateMenu($req->all());
    }

    function DeleteMenu($menu_id)
    {
        (new Menu())->DeleteMenu($menu_id);
    }
}
