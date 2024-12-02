<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product_category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('dashboard.content.products_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Product_category::all(); // Lấy danh mục sản phẩm
        return view('dashboard.content.product_add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $fileName = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('product/', $fileName);
        }
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'expired_at' => $request->expired_at,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'avatar' => $fileName,
        ]);
        //redirect
        return redirect()->route('dashboard.products')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Product_category::get();
        return view('dashboard.content.products_edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();
        if ($request->hasFile('avatar')) {
            if ($product->avatar && $product->avatar != "image_not_found.jpg") {
                Storage::delete('product/' . $product->avatar);
            }
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('product/', $fileName);
            $product->avatar = $fileName;
        }
        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'expired_at' => $request->expired_at,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'avatar' => $product->avatar,
        ]);
        return redirect()->route('dashboard.products')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products')
            ->with('success', 'Product deleted successfully');
    }
}
