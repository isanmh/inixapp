<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // $categories = Category::orderBy('id', 'desc')->get();
        $categories = Category::latest()->get();
        return view('category.index', compact('categories', 'title'));

        // cara lain untuk passing data ke view
        // return view('category.index', [
        //     'categories' => $categories
        // ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        $input = $request->validate(
            [
                'name' => 'required|string|min:3|max:255'
            ],
            [
                'name.required' => 'Nama kategori harus diisi',
            ]
        );

        Category::create($input);

        return redirect()->route('categories');
    }
}
