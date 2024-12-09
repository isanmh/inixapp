<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));

        // cara lain untuk passing data ke view
        // return view('category.index', [
        //     'categories' => $categories
        // ]);
    }
}
