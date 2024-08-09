<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "category_id";
    public $timestamps = true;
    public $incrementing = true;


    function GetCategory()
    {
        $category = Category::where("status", "=", "1");

        return $category;
    }

    function InsertCategory($data)
    {
        $category = new Category();
        $category->category_name = $data["category_name"];
        $category->save();
    }

    function UpdateCategory($data)
    {
        $category = Category::find($data["category_id"]);
        $category->category_name = $data["category_name"];
        $category->save();
    }

    function DeleteCategory($data)
    {
        $category = Category::find($data["category_id"]);
        $category->status = 0;
        $category->save();
    }
}
