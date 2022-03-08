<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        return view('employees.index');
    }

    public function create(Request $request) {
        return view('employees.create');
    }

    public function store(Request $request) {

    }
}
