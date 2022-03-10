<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Session;
use Illuminate\Support\Facades\Log;
use Exception;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::get();
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

    public function store(StoreRoleRequest $request)
    {
        try {
            $role = new Role();

            $role->name = $request->name;
            $role->description = $request->description;
            $role->is_protected = false;
            $role->save();

            Session::flash('success', 'Tạo mới thành công!');
        } catch (Exception $e) {
            Log::error('Error store role', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Tạo mới thất bại!');
        }

        return redirect()->route('roles.index');
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            $role = Role::find($id);
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();

            Session::flash('success', 'Cập nhật thành công!');
        } catch (Exception $e) {
            Log::error('Error update role', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Cập nhật thất bại!');
        }

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            $role->delete();

            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete role', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('roles.index');
    }
}
