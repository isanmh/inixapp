<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    public function test()
    {
        $data = [
            'status' => 'success',
            'code' => 200,
            'message' => 'API is working fine'
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function index()
    {
        // $products = Product::with('category')->get();
        $products = Product::with('category')->paginate(5);

        // $products = Product::all();
        // $products->load('category');

        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'Data produk berhasil diambil',
            'data' => $products
        ];

        return response()->json($products, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();

        // logika jika ada image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            // $target = public_path('assets/images');
            // $image->move($target, $imageName);

            // symlick laravel
            $image->storeAs('assets/images', $imageName, 'public');
            $input['image'] = $imageName;
        } else {
            $input['image'] = '';
        }

        Product::create($input);

        $data = [
            'status' => Response::HTTP_CREATED,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $input
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function show($id)
    {
        // hash id to find data
        $product = Product::with('category')->find($id);

        // jik data tidak ditemukan
        if (is_null($product)) {
            $data = [
                'status' => Response::HTTP_NOT_FOUND,
                'massage' => 'Data produk tidak ditemukan',
            ];
            return response()->json($data, Response::HTTP_NOT_FOUND);
        } else {
            $data = [
                'status' => Response::HTTP_OK,
                'massage' => 'Data produk ditemukan',
                'data' => $product
            ];
            return response()->json($data, Response::HTTP_OK);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::with('category')->find($id);

        if ($product) {
            $input = $request->validate([
                'name' => 'string|max:255',
                'price' => 'numeric',
                'description' => 'string|max:255',
                'image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,svg|max:2048',
                'category_id' => 'exists:categories,id',
            ]);

            $input = $request->all();

            // logika jika ada image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();

                if ($product->image) {
                    unlink(storage_path('app/public/assets/images/' . $product->image));
                }

                // symlick laravel
                $image->storeAs('assets/images', $imageName, 'public');
                $input['image'] = $imageName;
            } else {
                $input['image'] = $product->image;
            }

            $product->update($input);

            $data = [
                'status' => Response::HTTP_OK,
                'message' => 'Produk berhasil diupdate',
                'data' => $product
            ];
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data = [
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Produk tidak ditemukan',
            ];
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            if ($product->image) {
                unlink(storage_path('app/public/assets/images/' . $product->image));
            }
            $product->delete();

            $data = [
                'status' => Response::HTTP_OK,
                'message' => 'Produk berhasil dihapus',
            ];
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data = [
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Produk tidak ditemukan',
            ];
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }

    // search product
    public function search($name)
    {
        $products = Product::with('category')->where('name', 'like', '%' . $name . '%')->get();

        // $products = Product::with('category')->where('name', 'like', '%' . $name . '%')->paginate(100);

        // with query raw
        // $products = Product::with('category')->whereRaw("name LIKE '%$name%'")->get();

        // select with join & search like by name product
        // $products = Product::join('categories', 'products.category_id', '=', 'categories.id')->select('products.*', 'categories.name as category_name')->where('products.name', 'like', '%' . $name . '%')->get();

        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'Data produk berhasil diambil',
            'data' => $products
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
