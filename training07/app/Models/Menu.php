<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primaryKey = "menu_id";
    public $timestamps = true;
    public $incrementing = true;

    function GetMenu()
    {
        $menu = Menu::where("status", "=", 1)->get();
        return $menu;
    }

    function InsertMenu($data)
    {
        $newMenu = new Menu();
        $newMenu->menu_name = $data["menu_name"];
        $newMenu->menu_price = $data["menu_price"];

        $fileName = $this->insertFile($data["menu_picture"], "menu");
        $newMenu->menu_picture = $fileName;

        $newMenu->save();
    }

    function UpdateMenu($data)
    {
        $updateMenu = Menu::find($data["menu_id"]);
        $updateMenu->menu_name = $data["menu_name"];
        $updateMenu->menu_price = $data["menu_price"];
        $updateMenu->menu_available = $data["menu_available"];
        $updateMenu->save();
    }

    function DeleteMenu($menu_id)
    {
        $updateMenu = menu::find($menu_id);
        $updateMenu->status = 0;
        $updateMenu->save();
    }

    function insertFile($file, $folder)
    {
        try {
            $fileName = uniqid() . "." . $file->extension(); //nama baru
            $path = "/upload/" . $folder . "/";
            $file->move(public_path($path), $fileName);
            return $fileName;
        } catch (\Throwable $th) {
            return -1;
        }
    }
}
