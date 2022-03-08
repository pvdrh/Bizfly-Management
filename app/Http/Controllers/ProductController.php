<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        return view('products.index');
    }

    public function create(Request $request) {
        return view('products.create');
    }

    public function store(Request $request) {

    }
}
