<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        foreach ($products as $product) {
            $category = Category::find($product->category_id);
            $product->category_id = $category ? $category->name : "Đang cập nhật";
        }

        return view('products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('products.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = (int)$request->price;
        $product->quantity = (int)$request->quantity;
        $product->description = $request->description;
        $product->total_sold = 0;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->putFile('images/products', $request->file('image'));
            $product->image = $path;
        }
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::get();
        $product = Product::find($id);
        return view('products.edit')->with([
            'product' => $product,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = (int)$request->price;
        $product->quantity = (int)$request->quantity;
        $product->description = $request->description;
        $product->total_sold = 0;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->putFile('images/products', $request->file('image'));
            $product->image = $path;
        }
        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
