<?php

namespace App\Services;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductService
{
    public function showAll()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
        ]);
        return response()->json(null, 204);
    }

    public function show($id)
    {
        return response()->json(
            Product::findOrFail($id)
        );
    }

    public function update(UpdateProductRequest $request, $id)
    {
        Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
        ]);

        return response()->json(null, 204);
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
