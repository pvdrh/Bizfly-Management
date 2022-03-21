<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use App\Models\UserInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_code = Auth::user()->info->code;
        $customers = Customer::Where(['employee_code' => $user_code])->get();
        if (Auth::user()->info->role == UserInfo::ROLE['admin']) {
            return $next($request);
        } else if (count($customers) > 0) {
            return $next($request);
        } else {
            Session::flash('warning', 'Bạn không có quyền sử dụng chức năng này!');
            return redirect()->back();
        }
    }
}
