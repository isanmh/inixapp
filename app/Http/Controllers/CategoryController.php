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
        return view('category.index', compact('categories'));

        // cara lain untuk passing data ke view
        // return view('category.index', [
        //     'categories' => $categories,
        // ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        $input = $request->validate(
            // $rules
            [
                'name' => 'required|string|min:3|max:255'
            ],
            // $messages
            [
                'name.required' => 'Nama kategori harus diisi',
                'name.string' => 'Nama kategori harus berupa string',
            ]
        );

        Category::create($input);
        // flash message
        session()->flash('success', 'Kategori berhasil ditambahkan');

        return redirect()->route('categories');
    }

    // public function edit($id) {
    //     $category = Category::findOrFail($id);
    //     return view('category.edit', compact('category'));
    // }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $input = $request->validate([
            'name' => 'required|string|min:3|max:255'
        ]);

        $category->update($input);
        return redirect()->route('categories')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
