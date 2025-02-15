<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = 10;
        $products = Product::paginate($limit);
        return view('product.index', compact('products'));
    }

    public function list()
    {
        //
        $limit = 10;
        $products = Product::latest()->paginate($limit);
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = \App\Models\Category::get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|min:6',
            'category_id' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'selling_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable',
        ]);
        $validated['user_id'] = Auth::id();
        $product = Product::create($validated);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function view($product)
    {
        //
        $product = Product::where('slug', $product)->firstOrFail();
        return view('product.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = \App\Models\Category::get();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $validated = $request->validate([
            'name' => 'required|min:6',
            'category_id' => 'required',
            //'slug' => 'required|unique:products',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'selling_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable',
        ]);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        //$product->slug = $request->slug;
        $product->price = $request->price;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index');
    }
}
