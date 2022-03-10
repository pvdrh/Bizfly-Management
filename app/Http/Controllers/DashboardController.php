<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 1000, function () {
           return Category::count();
        });

        $products = Cache::remember('products', 1000, function () {
            return Product::count();
        });

        return view('dashboard')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
