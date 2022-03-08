<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(Request $request) {
//        $roles = DB::table('roles')->get();;
//        return view('roles.index')->with([
//            'roles' => $roles
//        ]);
        return view('roles.index');
    }

    public function create(Request $request) {
        return view('roles.create');
    }

    public function store(Request $request) {
        $role = new Role();

        $role->name = $request->role_name;
        $role->description = $request->role_description;
        $role->save();
    }
}
