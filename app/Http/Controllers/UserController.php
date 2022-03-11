<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('info')->get();
        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            $info = new UserInfo();
            $info->user_id = $user->id;
            $info->name = ucwords($request->get('name'));
            $info->gender = (int)$request->get('gender');
            $info->phone = (int)$request->get('phone');
            $info->address = $request->get('address');
            $info->role = $request->get('role');
            $info->is_protected = false;
            $info->save();

            Session::flash('success', 'Tạo mới thành công!');
        } catch (Exception $e) {
            Log::error('Error store user', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Tạo mới thất bại!');
        }
        return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('users.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = UserInfo::where('user_id', $id)->first();

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->gender = (int)$request->gender;
            $user->address = $request->address;
            $user->role = $request->role;
            $user->save();

            Session::flash('success', 'Cập nhật thành công!');
        } catch (Exception $e) {
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Cập nhật thất bại!');
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('users.index');
    }
}
