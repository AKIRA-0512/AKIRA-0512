<?php

namespace App\Http\Controllers;

use App\Models\Category2s;

class Category2sController extends Controller
{
public function index(Category $category)
    {
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
}