<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

        $customers = Cache::remember('customers', 1000, function () {
            return Customer::count();
        });

        $orders = Cache::remember('orders', 1000, function () {
            return Order::count();
        });

        return view('dashboard')->with([
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'customers' => $customers
        ]);
    }
}
