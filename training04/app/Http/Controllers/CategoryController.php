<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function CategoryPage()
    {
        $param["category"] = (new Category())->GetCategory();

        
    }

    function InsertCategory(Request $req) {}

    function UpdateCategory(Request $req) {}

    function DeleteCategory(Request $req) {}
}
