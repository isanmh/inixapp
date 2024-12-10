<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function test()
    {
        $data = [
            'status' => 'success',
            'code' => 200,
            'message' => 'API is working fine'
        ];
        return response()->json($data);
    }

    public function index()
    {
        $products = Product::with('category')->get();

        // $products = Product::all();
        // $products->load('category');

        return response()->json($products);
    }
}
