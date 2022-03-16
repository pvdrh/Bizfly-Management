<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    public function index(Request $request)
    {
        $user = Auth::user();
        if (Gate::allows('get-user', $user)) {
            $query = User::query();
            if ($request->has('search') && strlen($request->input('search')) > 0) {
                $query->whereHas('info', function ($qr) use ($request) {
                    $qr->where('code', 'LIKE', "%" . $request->input('search') . "%");
                });
            }
            $users = $query->with('info')->paginate(10);
            return view('users.index')->with([
                'users' => $users
            ]);
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if (Gate::allows('create-user', $user)) {
            return view('users.create');
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = Auth::user();
        if (Gate::allows('create-user', $user)) {
            try {

                $user = new User();
                $user->email = $request->get('email');
                $user->password = Hash::make($request->get('password'));
                $user->save();

                $info = new UserInfo();
                $info->user_id = $user->id;
                $info->name = $request->get('name');
                $info->gender = (int)$request->get('gender');
                $info->phone = $request->get('phone');
                $info->address = $request->get('address');
                $info->code = (string)rand(1000, 9999);
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
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
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
        $user = Auth::user();
        if (Gate::allows('update-user', $user)) {
            $user = User::find($id);
            return view('users.edit')->with([
                'user' => $user,
            ]);
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
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
        $user = Auth::user();
        if (Gate::allows('update-user', $user)) {
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
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if (Gate::allows('delete-user', $user)) {
            try {
                $user = User::find($id);
                $user_info = UserInfo::where('user_id', $user->_id)->delete();
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
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');

            return redirect()->route('dashboard');
        }
    }
}
