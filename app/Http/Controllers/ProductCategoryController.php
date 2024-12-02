<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use App\Http\Requests\StoreProduct_categoryRequest;
use App\Http\Requests\UpdateProduct_categoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Product_category::latest()->paginate(15);
        return view('dashboard.content.categories_list', ['categories' => $categories]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct_categoryRequest $request)
    {
        Product_category::create($request->validated());
        return redirect()->route('dashboard.categories')
            ->with('success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_category $product_category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product_category $product_category)
    {
        $categories = Product_category::whereNull('parent_id')->get();
        return view('dashboard.content.categories_edit', [
            'categories' => $categories,
            'product_category' => $product_category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct_categoryRequest $request, Product_category $product_category)
    {
        $product_category->update($request->validated());
        return redirect()->route('dashboard.categories')
            ->with('success', 'Product category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_category $product_category)
    {
        $product_category->delete();

        return redirect()->route('dashboard.categories')
            ->with('success', 'Product category deleted successfully');
    }

    public function select(){
        $categories = Product_category::whereNull('parent_id')->get();
        return view('dashboard.content.category_add',['categories' => $categories]);
    }

    public function get(){
        
    }
}
