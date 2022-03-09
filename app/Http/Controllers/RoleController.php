<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::get();;
        return view('roles.index')->with([
            'roles' => $roles
        ]);
    }

    public function create(Request $request)
    {
        return view('roles.create');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit')->with('role', $role);
    }

    public function store(Request $request)
    {
        $role = new Role();

        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('roles.index');
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles.index');
    }
}
