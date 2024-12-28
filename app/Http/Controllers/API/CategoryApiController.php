<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
