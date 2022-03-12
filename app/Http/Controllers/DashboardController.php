<?php

namespace App\Http\Controllers;

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
